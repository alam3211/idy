<?php

namespace Idy\Ipd\Application;

class SubmitKuisionerKelasRequest
{
    public $idKelas;
    public $idMahasiswa;
    public $pertanyaan;
    public $jawaban;
    public $catatan;
    public $jenisKuisoner;
    public $bobot;
    
    public function __construct($idKelas,$idMahasiswa, $pertanyaan = [], $jawaban = [], $bobot = [], $catatan = null, $jenisKuisoner = 1)
    {
        $this->idKelas    = $idKelas;
        $this->idMahasiswa= $idMahasiswa;
        $this->pertanyaan   = $pertanyaan;
        $this->jawaban  = $jawaban;
        $this->catatan  = $catatan;
        $this->jenisKuisoner  = $jenisKuisoner;
        $this->bobot  = $bobot;
    }

}