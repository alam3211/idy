<?php

namespace Idy\Ipd\Domain\Model;

use Idy\Ipd\Domain\Model\JawabanKuisioner;

class PertanyaanKuisioner
{
    private $id;
    private $isi;
    private $isiInggris;
    
    public function __construct($id = null, $isi, $isiInggris)
    {
        $this->id           = $id;
        $this->isi          = $isi;
        $this->isiInggris   = $isiInggris;
    }

    public function id()
    {
        return $this->id;
    }

    public function isi()
    {
        return $this->isi;
    }

    public function isiInggris()
    {
        return $this->isiInggris;
    }
}