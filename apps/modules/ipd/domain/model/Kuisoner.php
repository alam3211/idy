<?php

namespace Idy\Ipd\Domain\Model;

class Kuisoner
{
    private $id;
    private $mahasiswa;
    private $kelas;
    
    public function __construct($id = null,Mahasiswa $mahasiswa,Kelas $kelas)
    {
        $this->id = $id;
        $this->mahasiswa = $mahasiswa;
        $this->kelas = $kelas;
    }

    public function id(){
        return $this->id;
    }

    public function mahasiswa(){
        return $this->mahasiswa;
    }
    
    public function kelas(){
        return $this->kelas;
    }

}