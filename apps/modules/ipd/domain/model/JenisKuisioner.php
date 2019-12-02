<?php

namespace Idy\Ipd\Domain\Model;

class JenisKuisioner
{
    private $id;
    private $nama;
    private $namaInggris;
    
    public function __construct($id = null, $nama, $namaInggris)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->namaInggris = $namaInggris;
    }

}