<?php

namespace Idy\Ipd\Domain\Model;

use \Idy\Ipd\Domain\Model\PertanyaanKuisioner;
use Idy\Ipd\Domain\Model\JawabanKuisionerId;

class JawabanKuisioner
{
    private $id;
    private $jawaban;
    private $jawabanInggris;
    private $bobot;
    
    public function __construct($jawaban, $jawabanInggris, $bobot, JawabanKuisionerId $id)
    {
        $this->id = $id;
        $this->jawaban = $jawaban;
        $this->jawabanInggris = $jawabanInggris;
        $this->bobot = $bobot;
    }

    public function id(){
        return $this->id;
    }

    public function jawaban(){
        return $this->jawaban;
    }

    public function setJawaban($jawaban){
        $this->jawaban = $jawaban;
    }

    public function jawabanInggris(){
        return $this->jawabanInggris;
    }

    public function setJawabanInggris($jawabanInggris){
        $this->jawabanInggris = $jawabanInggris;
    }

    public function bobot(){
        return $this->bobot;
    }

    public function setBobot($bobot){
        $this->bobobt = $bobot;
    }

    public static function makeJawabanKuisioner($jawaban, $jawabanInggris, $bobot , $id = null){
        $jawabanKusioner = new JawabanKuisioner($jawaban, $jawabanInggris, $bobot, new JawabanKuisionerId($id));
        
        return $jawabanKusioner;
    }
}