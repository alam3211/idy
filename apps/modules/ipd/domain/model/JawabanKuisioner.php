<?php

namespace Idy\Ipd\Domain\Model;

class JawabanKuisinoner
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
}