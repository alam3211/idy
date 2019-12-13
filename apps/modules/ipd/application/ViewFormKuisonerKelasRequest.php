<?php

namespace Idy\Ipd\Application;

class ViewFormKuisonerKelasRequest
{
    public $idKelas;
    
    public function __construct($idKelas)
    {
        $this->idKelas = $idKelas;
    }

}