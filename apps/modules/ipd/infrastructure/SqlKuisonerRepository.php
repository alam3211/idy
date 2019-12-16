<?php 

namespace Idy\Ipd\Infrastructure;

use Idy\Ipd\Domain\Model\FrsRepository;
use Idy\Ipd\Domain\Model\JawabanKuisioner;
use Phalcon\Di;

use Idy\Ipd\Domain\Model\PertanyaanKuisioner;
use Idy\Ipd\Domain\Model\PertanyaanKuisionerId;
use Idy\Ipd\Domain\Model\PertanyaanRepository;
use Idy\Ipd\Domain\Model\JenisPertanyaan;
use Idy\Ipd\Domain\Model\Kuisoner;
use Idy\Ipd\Domain\Model\KuisonerRepository;
use Idy\Ipd\Domain\Model\Mahasiswa;

class SqlKuisonerRepository implements KuisonerRepository
{
    private $db;
    private $dbTable;
    public function __construct($db)
    {        
        $this->db = $db;
    }

    public function getKuisonerDosenMahasiswaId(Mahasiswa $mahasiswa){
        $querySet = $this->db->query(
            "SELECT kelaskuliah.id_kelas, kelaskuliah.id_mahasiswa, kelaskuliah.nama, kelaskuliah.mata_kuliah, kelaskuliah.kode_matkul, kelaskuliah.id_dosen, kelaskuliah.nama_dosen, kuisoner.id_kuisoner
            FROM
            (SELECT frs.id_kelas as id_kelas, frs.id_mahasiswa as id_mahasiswa, kelas.nama as nama, mata_kuliah.nama as mata_kuliah, mata_kuliah.kode as kode_matkul, dosen.id as id_dosen, dosen.nama as nama_dosen 
            FROM frs, kelas, mata_kuliah, dosen
            WHERE frs.id_kelas = kelas.id AND kelas.mata_kuliah_id = mata_kuliah.id AND kelas.dosen_id = dosen.id AND frs.id_mahasiswa = ?) kelaskuliah
            LEFT JOIN kuisoner ON kelaskuliah.id_mahasiswa = kuisoner.id_mahasiswa AND kuisoner.id_kelas = kelaskuliah.id_kelas AND kuisoner.jenis_id = 1",
             [
                 $mahasiswa->id()
             ]
        );
        $resultSet = $querySet->fetchAll();
        return $resultSet;
    }

    public function getKuisonerKelasMahasiswaId(Mahasiswa $mahasiswa){
        $querySet = $this->db->query(
            "SELECT kelaskuliah.id_kelas, kelaskuliah.id_mahasiswa, kelaskuliah.nama, kelaskuliah.mata_kuliah, kelaskuliah.kode_matkul, kelaskuliah.id_dosen, kelaskuliah.nama_dosen, kuisoner.id_kuisoner
            FROM
            (SELECT frs.id_kelas as id_kelas, frs.id_mahasiswa as id_mahasiswa, kelas.nama as nama, mata_kuliah.nama as mata_kuliah, mata_kuliah.kode as kode_matkul, dosen.id as id_dosen, dosen.nama as nama_dosen 
            FROM frs, kelas, mata_kuliah, dosen
            WHERE frs.id_kelas = kelas.id AND kelas.mata_kuliah_id = mata_kuliah.id AND kelas.dosen_id = dosen.id AND frs.id_mahasiswa = ?) kelaskuliah
            LEFT JOIN kuisoner ON kelaskuliah.id_mahasiswa = kuisoner.id_mahasiswa AND kuisoner.id_kelas = kelaskuliah.id_kelas AND kuisoner.jenis_id = 2",
             [
                 $mahasiswa->id()
             ]
        );
        $resultSet = $querySet->fetchAll();
        return $resultSet;
    }

    public function submitForm(Kuisoner $kuisoner){
        $querySetKuisoner = $this->db->execute(
            "INSERT INTO kuisoner ( jenis_id , id_kelas, id_mahasiswa, catatan) VALUES (?,?,?,?)",
            [
                $kuisoner->jenisId(),
                $kuisoner->idKelas(),
                $kuisoner->idMahasiswa(),
                $kuisoner->catatan(),
            ]
        );
        $id = $this->db->lastInsertId();
        foreach ($kuisoner->idPertanyaan() as $index => $item) {
            $querySetResponse = $this->db->execute(
                "INSERT INTO response_kuisoner ( kuisoner_id , pertanyaan_id, jawaban_id, bobot) VALUES (?,?,?,?)",
                [
                    $id,
                    $kuisoner->idPertanyaan()[$index],
                    $kuisoner->idJawaban()[$index],
                    $kuisoner->bobot()[$index],
                ]
            );
        }
        return $querySetResponse;
    }
}