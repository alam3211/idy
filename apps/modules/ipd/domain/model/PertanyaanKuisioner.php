<?php

namespace Idy\Ipd\Domain\Model;

use Idy\Ipd\Domain\Model\JawabanKuisioner;

class PertanyaanKuisioner
{
    private $id;
    private $isi;
    private $isiInggris;
    private $jawaban = array();
    
    public function __construct($isi, $isiInggris, JawabanKuisinoner $jawaban = null, $id = null)
    {
        $this->id           = $id;
        $this->isi          = $isi;
        $this->isiInggris   = $isiInggris;
    }

    public function id()
    {
        return $this->id;
    }

    public function isi()
    {
        return $this->isi;
    }

    public function isiInggris()
    {
        return $this->isiInggris;
    }

    public function addJawaban($newJawaban){
        
        $existed = false;
        foreach($this->jawaban as $item){
            if($item->equals($newJawaban->id)){
                $existed = true;
            }
        }
        
        if($existed){
            throw new Exception('Jawaban dengan id '.$newJawaban->id.' telah ada!');
        }else{
            array_push($this->jawaban, $newJawaban);
        }
    }

    public static function makePertanyaanKuisioner($isi, $isiInggris, $jawaban = null, $id = null){
        $pertanyaanKuisioner = new PertanyaanKuisioner($isi, $isiInggris, $jawaban, $id);
        return $pertanyaanKuisioner;
    }
}