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

    public function allMataKuliah()
    {
        $querySet = $this->db->query(
            "SELECT * FROM mata_kuliah "
        );
        $resultSet = $querySet->fetchAll();

        return $resultSet;
    }

    public function kuisionerbyKelas($request)
    {
        $querySet = $this->db->query(
            "SELECT ku.id_kuisoner as id_kuisioner, ke.nama as nama_kelas, rk.kuisoner_id as id_respon_kuisioner , rk.bobot as bobot_respon_kuisioner, ku.jenis_id as jenis_kuisioner, ku.catatan as catatan_kuisioner
            FROM kuisoner as ku 
            INNER JOIN kelas as ke on ku.id_kelas = ke.id
            LEFT JOIN response_kuisoner as rk on ku.id_kuisoner = rk.kuisoner_id
            WHERE ku.id_kelas = ?",[
                $request->idKelas
            ]
        );

        $resultSet = $querySet->fetchAll();

        return $this->groupKuisionerwithRespon($resultSet);
    }

    public function ipmkbyDosen()
    {
        $querySet = $this->db->query(
            "SELECT * FROM mata_kuliah "
        );
        $resultSet = $querySet->fetchAll();

        return $resultSet;
    }

    public function groupKuisionerwithRespon($resultSet){
        $temp = array();
        foreach($resultSet as $item){
            if(!array_key_exists($item['id_kuisioner'],$temp)){
                $temp[$item['id_kuisioner']]['respon_kuisioner'] = array();
                $temp[$item['id_kuisioner']]['catatan_kuisioner'] = $item['catatan_kuisioner'];
                if($item['jenis_kuisioner'] == 1)
                    $temp[$item['id_kuisioner']]['jenis_kuisioner'] = "Dosen";
                else
                    $temp[$item['id_kuisioner']]['jenis_kuisioner'] = "Mata_Kuliah";
                $temp[$item['id_kuisioner']]['respon_kuisioner'] = array();
                $temp[$item['id_kuisioner']]['respon_kuisioner'][] = array(
                                                    'id'=>$item['id_respon_kuisioner'],
                                                    'bobot' => $item['bobot_respon_kuisioner']
                                                    );
            }else{
                $temp[$item['id_kuisioner']]['respon_kuisioner'][] = array(
                                                    'id'=>$item['id_respon_kuisioner'],
                                                    'bobot' => $item['bobot_respon_kuisioner']
                                                    );
            }
        }

        return $temp;
    }

    public function cmp($a, $b) {
        return strcmp($a['bobot'], $b['bobot']);
    }
    

}