<?php 

namespace Idy\Ipd\Infrastructure;

use Idy\Ipd\Domain\Model\FrsRepository;
use Idy\Ipd\Domain\Model\JawabanKuisioner;
use Phalcon\Di;

use Idy\Ipd\Domain\Model\PertanyaanKuisioner;
use Idy\Ipd\Domain\Model\PertanyaanKuisionerId;
use Idy\Ipd\Domain\Model\PertanyaanRepository;
use Idy\Ipd\Domain\Model\JenisPertanyaan;
use Idy\Ipd\Domain\Model\Kelas;
use Idy\Ipd\Domain\Model\KelasRepository;
use Idy\Ipd\Domain\Model\KuisonerRepository;
use Idy\Ipd\Domain\Model\Mahasiswa;

class SqlKelasRepository implements KelasRepository
{
    private $db;
    private $dbTable;
    public function __construct($db)
    {        
        $this->db = $db;
    }

    public function getKelasById($id){
        $querySet = $this->db->query(
            "SELECT kelas.id as kelas_id, mata_kuliah.nama as nama_kelas, mata_kuliah.kode as kode_kelas, dosen.nama as nama_dosen 
            FROM kelas, dosen, mata_kuliah 
            WHERE kelas.mata_kuliah_id = mata_kuliah.id AND kelas.dosen_id = dosen.id AND kelas.id = ?",
             [
                 $id
             ]
        );
        $resultSet = $querySet->fetchAll();
        return $resultSet;
    }
}