<?php

namespace Idy\Ipd\Domain\Model;

class PertanyaanKuisioner
{
    private $id;
    private $isi;
    private $isiInggris;
    
    public function __construct($id = null, $isi, $isiInggris)
    {
        $this->id = $id;
        $this->isi = $isi;
        $this->isiInggris = $isiInggris;
    }

}