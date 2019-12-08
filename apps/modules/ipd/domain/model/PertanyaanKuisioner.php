<?php

namespace Idy\Ipd\Domain\Model;

use Idy\Ipd\Domain\Model\JawabanKuisioner;

class PertanyaanKuisioner
{
    private $id;
    private $isi;
    private $isiInggris;
    private $jawaban = array();
    private $jenis;

    public function __construct($isi, $isiInggris,JenisPertanyaan $jenis, JawabanKuisinoner $jawaban = null, PertanyaanKuisionerId $id)
    {
        $this->id           = $id;
        $this->isi          = $isi;
        $this->isiInggris   = $isiInggris;
        $this->jenis        = $jenis;
    }

    public function id()
    {
        return $this->id;
    }

    public function isi()
    {
        return $this->isi;
    }

    public function setIsi($isi){
        $this->isi = $isi;
    }

    public function isiInggris()
    {
        return $this->isiInggris;
    }
    
    public function setIsiInggris($isiInggris){
        $this->isiInggris = $isiInggris;
    }

    public function jenis(){
        return $this->jenis;
    }

    public function addJawaban($newJawaban){
        
        $existed = false;
        foreach($this->jawaban as $item){
            if($item->id()->equals($newJawaban->id())){
                $existed = true;
            }
        }
        
        if($existed){
            throw new Exception('Jawaban dengan id '.$newJawaban->id.' telah ada!');
        }else{
            array_push($this->jawaban, $newJawaban);
        }
    }

    public static function makePertanyaanKuisioner($isi, $isiInggris, $jenis, $jawaban = null, $id = null ){
        $pertanyaanKuisioner = new PertanyaanKuisioner($isi, $isiInggris,new JenisPertanyaan($jenis), $jawaban, new PertanyaanKuisionerId($id) );
        return $pertanyaanKuisioner;
    }
}