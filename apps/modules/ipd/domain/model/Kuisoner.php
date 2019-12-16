<?php

namespace Idy\Ipd\Domain\Model;

class Kuisoner
{
    private $id;
    private $idMahasiswa;
    private $idKelas;
    private $idJawaban;
    private $idPertanyaan;
    private $jenisId;
    private $catatan;
    private $bobot;
    
    public function __construct($idMahasiswa,$idKelas, $idJawaban = [], $bobot = [], $idPertanyaan = [], $jenisId = 1, $catatan = null, $id = null)
    {
        $this->id = $id;
        $this->idMahasiswa = $idMahasiswa;
        $this->idKelas = $idKelas;
        $this->idPertanyaan = $idPertanyaan;
        $this->idJawaban = $idJawaban;
        $this->jenisId = $jenisId;
        $this->catatan = $catatan;
        $this->bobot = $bobot;
    }

    public function id(){
        return $this->id;
    }

    public function idMahasiswa(){
        return $this->idMahasiswa;
    }
    
    public function idKelas(){
        return $this->idKelas;
    }
    public function idJawaban(){
        return $this->idJawaban;
    }
    public function idPertanyaan(){
        return $this->idPertanyaan;
    }

    public function catatan(){
        return $this->catatan;
    }

    public function bobot(){
        return $this->bobot;
    }

    public function jenisId(){
        return $this->jenisId;
    }

}