<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\PertanyaanKuisioner;

class UpdateJawabanKuisionerRequest
{
    public $id;
    public $jawaban;
    public $jawabanInggris;
    public $bobot;
    public $pertanyaanKuisioner;

    public function __construct($jawaban, $jawabanInggris, $bobot, PertanyaanKuisioner $pertanyaanKuisioner, $id)
    {
        $this->id                   = $id;
        $this->jawaban              = $jawaban;
        $this->jawabanInggris       = $jawabanInggris;
        $this->bobot                = $bobot;
        $this->pertanyaanKuisioner  = $pertanyaanKuisioner;
    }

}