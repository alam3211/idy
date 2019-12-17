<?php

namespace Idy\Ipd\Application;

class ViewCatatanKuisionerbyKelasRequest
{
    public $id;
    
    public function __construct($idKelas)
    {
        $this->id      = $idKelas;
    }

}