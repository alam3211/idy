<?php

namespace Idy\Ipd\Domain\Model;

use Idy\Ipd\Domain\Model\Kuisioner;

class ResponKuisioner
{
    private $bobot;
    private $id;
    private $kuisioner;
    
    public function __construct($id = null,Kuisioner $kuisioner, $bobot)
    {
        $this->id = $id;
        $this->kuisioner = $kuisioner;
        $this->kelas = $kelas;
    }

    public function id(){
        return $this->id;
    }

    public function kuisioner(){
        return $this->kuisioner;
    }
    
    public function kelas(){
        return $this->kelas;
    }

}