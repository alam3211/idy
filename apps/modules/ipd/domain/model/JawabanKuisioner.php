<?php

namespace Idy\Ipd\Domain\Model;

use \Idy\Ipd\Domain\Model\PertanyaanKuisioner;

class JawabanKuisioner
{
    private $id;
    private $jawaban;
    private $jawabanInggris;
    private $bobot;
    private $pertanyaan;
    
    public function __construct($jawaban, $jawabanInggris, $bobot, PertanyaanKuisioner $pertanyaan, $id = null)
    {
        $this->id = $id;
        $this->jawaban = $jawaban;
        $this->jawabanInggris = $jawabanInggris;
        $this->bobot = $bobot;
        $this->pertanyaan = $pertanyaan;
    }

    public function id()
    {
        return $this->id;
    }

    public function jawaban()
    {
        return $this->jawaban;
    }

    public function jawabanInggris()
    {
        return $this->jawabanInggris;
    }

    public function bobot()
    {
        return $this->bobot;
    }

    public function pertanyaan()
    {
        return $this->pertanyaan;
    }

    public static function makeJawabanKuisioner($jawaban, $jawabanInggris, $bobot, PertanyaanKuisioner $pertanyaan, $id = null)
    {
        $jawabanKuisioner = new JawabanKuisioner($jawaban, $jawabanInggris, $bobot, $pertanyaan, $id);
        return $jawabanKuisioner;
    }

}