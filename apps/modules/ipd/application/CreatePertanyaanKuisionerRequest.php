<?php

namespace Idy\Ipd\Application;

class CreatePertanyaanKuisionerRequest
{
    public $isi;
    public $isiInggris;

    public function __construct($isi, $isiInggris)
    {
        $this->isi          = $isi;
        $this->isiInggris   = $isiInggris;
    }

}