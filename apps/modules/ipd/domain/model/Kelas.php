<?php

namespace Idy\Ipd\Domain\Model;

class Kelas
{
    private $id;
    private $mataKuliah;
    private $dosen;
    
    public function __construct($id = null,MataKuliah $mataKuliah, Dosen $dosen)
    {
        $this->id = $id;
        $this->mataKuliah = $mataKuliah;
        $this->dosen = $dosen;
    }

    public function id(){
        return $this->id;
    }

    public function dosen(){
        return $this->dosen;
    }

    public function mataKuliah(){
        return $this->mataKuliah;
    }
}