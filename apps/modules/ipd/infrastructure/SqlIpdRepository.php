<?php 

namespace Idy\Ipd\Infrastructure;
use Phalcon\Di;

use Idy\Ipd\Domain\Model\PertanyaanKuisioner;
use Idy\Ipd\Domain\Model\KuisionerRepository;

class SqlIpdRepository implements KuisionerRepository
{
    private $db;
    private $dbTable;
    public function __construct($db)
    {        
        $this->db = $db;
    }

    public function save(PertanyaanKuisioner $pertanyaanKuisioner)
    {
            $querySet   = $this->db->execute(
                "INSERT INTO pertanyaan_kuisioner (id, isi, isi_inggris) VALUES (?,?,?)",
                [
                    $pertanyaanKuisioner->id()->id(),
                    $pertanyaanKuisioner->isi(),
                    $pertanyaanKuisioner->isiInggris(),
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
        return $resultSet;
    }

    public function allPertanyaanWithJawaban(){
        $querySet = $this->db->query(
            "SELECT * FROM pertanyaan_kuisioner as p INNER JOIN jawaban_kuisioner as j on p.id = j.pertanyaan_id"
        );
        $resultSet = $querySet->fetchAll();
        return $resultSet;
    }

    public function pertanyaanWithJawabanByPertanyaanId($id){
        $querySet = $this->db->query(
            "SELECT * FROM pertanyaan_kuisioner as p INNER JOIN jawaban_kuisioner as j on p.id = j.pertanyaan_id WHERE p.id = ?",[
                $id
            ]
        );
        $resultSet = $querySet->fetchAll();
        return $resultSet;
    }

}