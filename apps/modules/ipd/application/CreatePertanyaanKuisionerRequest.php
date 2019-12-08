<?php

namespace Idy\Ipd\Application;

class CreatePertanyaanKuisionerRequest
{
    public $isi;
    public $isiInggris;
    public $jenis;
    
    public function __construct($isi, $isiInggris, $jenis)
    {
        $this->isi          = $isi;
        $this->isiInggris   = $isiInggris;
        $this->jenis        = $jenis;
    }

}