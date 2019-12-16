<?php

namespace Idy\Ipd\Application;

class ViewFormKuisonerDosenRequest
{
    public $idKelas;
    
    public function __construct($idKelas)
    {
        $this->idKelas = $idKelas;
    }

}