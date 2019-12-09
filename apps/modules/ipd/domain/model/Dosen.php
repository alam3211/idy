<?php

namespace Idy\Ipd\Domain\Model;

class Dosen
{
    private $id;
    private $nik;
    private $namaDosen;
    
    public function __construct($nik, $namaDosen, $id = null)
    {
        $this->id = $id;
        $this->nik = $nik;
        $this->namaDosen = $namaDosen;
    }

}