<?php 

namespace Idy\Ipd\Infrastructure;

use Idy\Ipd\Domain\Model\JawabanKuisioner;
use Phalcon\Di;

use Idy\Ipd\Domain\Model\PertanyaanKuisioner;
use Idy\Ipd\Domain\Model\PertanyaanKuisionerId;
use Idy\Ipd\Domain\Model\PertanyaanRepository;
use Idy\Ipd\Domain\Model\JenisPertanyaan;

class SqlPertanyaanRepository implements PertanyaanRepository
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
                "INSERT INTO pertanyaan_kuisioner (id, jenis_id , isi, isi_inggris) VALUES (?,?,?,?)",
                [
                    $pertanyaanKuisioner->id()->id(),
                    $pertanyaanKuisioner->jenis()->id(),
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

        $pertanyaan_collection = array();
        return $resultSet;
    }

    public function allPertanyaanWithJawaban(JenisPertanyaan $jenis){
        $querySet = $this->db->query(
            "SELECT p.id as pid, j.id as jid, p.isi as isi, p.isi_inggris as isi_inggris, 
                j.jawaban as jawaban, j.jawaban_inggris as jawaban_inggris, j.bobot as bobot
             FROM pertanyaan_kuisioner as p INNER JOIN jawaban_kuisioner as j on p.id = j.pertanyaan_id ORDER BY pid,bobot"
        );
        $resultSet = $querySet->fetchAll();
        
        return $this->groupPertanyaanWithJawaban($resultSet);
    }

    public function pertanyaanWithJawabanByPertanyaanId(PertanyaanKuisionerId $pertanyaanId){
        $querySet = $this->db->query(
            "SELECT p.id as pid, j.id as jid, p.isi as isi, p.isi_inggris as isi_inggris, 
                j.jawaban as jawaban, j.jawaban_inggris as jawaban_inggris, j.bobot as bobot
            FROM pertanyaan_kuisioner as p INNER JOIN jawaban_kuisioner as j on p.id = j.pertanyaan_id 
            WHERE p.id = ?",[
                $pertanyaanId->id()
            ]
        );
        $resultSet = $querySet->fetchAll();
        return $this->groupPertanyaanWithJawaban($resultSet);
    }

    public function update($pertanyaanId, $isi ,$isiInggris){
        $querySet = $this->db->execute(
            "UPDATE FROM pertanyaan_kuisioner SET isi = ?, isiInggris = ? WHERE id = ?",[
                $isi,
                $isiInggris,
                $pertanyaanId->id()
            ]
        );
        $resultSet = $querySet;
        return $resultSet;
    }

    public function destroy($array_of_id){
        $querySet = $this->db->execute(
            "DELETE FROM pertanyaan_kuisioner WHERE id = IN (?)",[
                $array_of_id
            ]
        );
        $resultSet = $querySet;
        return $resultSet;
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