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
            "SELECT k.id as id, k.nama as nama_kelas, mk.kode as kode_mata_kuliah, mk.nama as nama_mata_kuliah, mk.sks as sks_mata_kuliah, k.daya_tampung as daya_tampung
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


}