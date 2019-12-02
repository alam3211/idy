<?php

namespace Idy\Ipd\Domain\Model;

use Idy\ipd\Domain\Model\JawabanKuisionerId;

class JawabanKuisinoner
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

    public function jawabanInggris(){
        return $this->jawabanInggis;
    }

    public function bobot(){
        return $this->bobot;
    }

    public static function makeJawabanKuisioner($jawaban, $jawabanInggris, $bobot){
        $jawabanKusioner = new JawabanKuisinoner($jawaban, $jawabanInggris, $bobot, new JawabanKuisionerId());
        
        return $jawabanKusioner;
    }
}