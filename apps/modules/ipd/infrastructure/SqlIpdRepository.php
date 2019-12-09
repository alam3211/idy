<?php 

namespace Idy\Ipd\Infrastructure;

use Idy\Ipd\Domain\Model\JawabanKuisioner;
use Phalcon\Di;

use Idy\Ipd\Domain\Model\PertanyaanKuisioner;
use Idy\Ipd\Domain\Model\IpdRepository;
use Idy\Ipd\Domain\Model\PertanyaanKuisionerId;

class SqlIpdRepository implements IpdRepository
{
    private $db;
    private $dbTable;
    public function __construct($db)
    {        
        $this->db = $db;
    }

    public function allDosen()
    {
        $querySet = $this->db->query(
            "SELECT * FROM dosen "
        );
        $resultSet = $querySet->fetchAll();

        return $resultSet;
    }

    public function kelasbyDosen()
    {
        $querySet = $this->db->query(
            "SELECT k.id as id, k.nama as nama_kelas, mk.nama as nama_mata_kuliah, mk.sks as sks_mata_kuliah, k.daya_tampung as daya_tampung
            FROM kelas as k INNER JOIN dosen as d on k.dosen_id = d.id INNER JOIN mata_kuliah as mk on k.mata_kuliah_id = mk.id
            WHERE dosen_id = 1"
        );
        $resultSet = $querySet->fetchAll();
        return $resultSet;
    }


    public function allMataKuliah()
    {
        $querySet = $this->db->query(
            "SELECT * FROM mata_kuliah "
        );
        $resultSet = $querySet->fetchAll();

        return $resultSet;
    }

    public function save(PertanyaanKuisioner $pertanyaanKuisioner)
    {
            $querySet   = $this->db->execute(
                "INSERT INTO pertanyaan_kuisioner (id, isi, isi_inggris) VALUES (?,?,?)",
                [
                    $pertanyaanKuisioner->id()->id(),
                    $pertanyaanKuisioner->isi(),
                    $pertanyaanKuisioner->isiInggris()
                ]
            );
        $resultSet = $querySet;
        return $resultSet;
    }

    public function allPertanyaanKuisioner()
    {
        $querySet = $this->db->query(
            "SELECT * FROM pertanyaan_kuisioner "
        );
        $resultSet = $querySet->fetchAll();

        $pertanyaan_collection = array();
        return $resultSet;
    }

    public function allPertanyaanWithJawaban(){
        $querySet = $this->db->query(
            "SELECT p.id as pid, j.id as jid, p.isi as isi, p.isi_inggris as isi_inggris, 
                j.jawaban as jawaban, j.jawaban_inggris as jawaban_inggris, j.bobot as bobot
             FROM pertanyaan_kuisioner as p INNER JOIN jawaban_kuisioner as j on p.id = j.pertanyaan_id ORDER BY pid,bobot"
        );
        $resultSet = $querySet->fetchAll();
        
        return $this->groupPertanyaanWithJawaban($resultSet);
    }

    public function groupPertanyaanWithJawaban($query_result){
        $temp = array();

        foreach($query_result as $item){
            if(!array_key_exists($item['pid'],$temp)){
                $temp[$item['pid']]['detail'] = array();
                $temp[$item['pid']]['detail'][] = array(
                                                    'isi'=>$item['isi'],
                                                    'isiInggris' => $item['isi_inggris']
                                                    );
                $temp[$item['pid']]['relation'] = array();
                $temp[$item['pid']]['relation'][]  = array(
                                                        'id' => $item['jid'],
                                                        'jawaban' => $item['jawaban'],
                                                        'jawabanInggris' => $item['jawaban_inggris'],
                                                        'bobot' => $item['bobot'] 
                                                    );
            }else{
                $temp[$item['pid']]['relation'][]  = array(
                                                        'id' => $item['jid'],
                                                        'jawaban' => $item['jawaban'],
                                                        'jawabanInggris' => $item['jawaban_inggris'],
                                                        'bobot' => $item['bobot'] 
                                                    );
            }
        }

        return $temp;
    }

    public function cmp($a, $b) {
        return strcmp($a['bobot'], $b['bobot']);
    }
    

}