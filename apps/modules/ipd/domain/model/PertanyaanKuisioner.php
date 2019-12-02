<?php

namespace Idy\Ipd\Domain\Model;

use Idy\Ipd\Domain\Model\JawabanKuisioner;

class PertanyaanKuisioner
{
    private $id;
    private $isi;
    private $isiInggris;
    
    public function __construct($isi, $isiInggris, $jawaban = null, $id = null)
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

    public static function makePertanyaanKuisioner($isi, $isiInggris, $jawaban = null, $id = null){
        $pertanyaanKuisioner = new PertanyaanKuisioner($isi, $isiInggris, $jawaban, $id);
        return $pertanyaanKuisioner;
    }
}