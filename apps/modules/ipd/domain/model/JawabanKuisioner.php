<?php

namespace Idy\Ipd\Domain\Model;

class JawabanKuinoner
{
    private $id;
    private $jawaban;
    private $jawabanInggris;
    private $bobot;
    private $pertanyaan;
    
    public function __construct($id = null, $jawaban, $jawabanInggris, $bobot, PertanyaanKuisioner $pertanyaan)
    {
        $this->id = $id;
        $this->jawaban = $jawaban;
        $this->jawabanInggris = $jawabanInggris;
        $this->bobot = $bobot;
        $this->pertanyaan = $pertanyaan;
    }
}