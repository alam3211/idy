<?php 

namespace Idy\Ipd\Infrastructure;
use Phalcon\Di;

use Idy\Ipd\Domain\Model\PertanyaanKuisioner;
use Idy\Ipd\Domain\Model\JawabanKuisioner;
use Idy\Ipd\Domain\Model\JawabanRepository;

class SqlJawabanRepository implements JawabanRepository
{
    private $db;
    private $dbTable;
    public function __construct($db)
    {        
        $this->db = $db;
    }

    public function save(JawabanKuisioner $jawabanKuisioner, PertanyaanKuisioner $pertanyaanKuisioner)
    {
        return "save success";
        //     $querySet   = $this->db->execute(
        //         "INSERT INTO pertanyaan_kuisioner (isi, isinggris) VALUES (?,?)",
        //         [
        //             $pertanyaanKuisioner->isi(),
        //             $pertanyaanKuisioner->isiInggris(),
        //         ]
        //     );
        // $resultSet = $querySet;
        // return $resultSet;
    }

    public function byPertanyaan(PertanyaanKuisioner $pertanyaanKuisioner)
    {
        $querySet = $this->db->query(
            "SELECT * FROM jawaban_kuisioner WHERE pertanyaanId = ? ",
            [
                $pertanyaanKuisioner->id
            ]
        );
        $resultSet = $querySet->fetchAll();
        return $resultSet;
    }

}