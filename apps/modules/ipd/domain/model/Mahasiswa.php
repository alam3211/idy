<?php

namespace Idy\Ipd\Domain\Model;

class Mahasiswa
{
    private $id;
    private $nrp;
    private $nama;
    
    public function __construct($nrp, $nama, $id = null)
    {
        $this->id = $id;
        $this->nrp = $nrp;
        $this->nama = $nama;
    }

    public function id(){
        return $this->id;
    }

    public function nrp(){
        return $this->nrp;
    }
    
    public function nama(){
        return $this->nama;
    }

}