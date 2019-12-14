<?php

namespace Idy\Ipd\Application;

class ViewIpdKuisionerbyKelasRequest
{
    public $idKelas;
    public $dayaTampung;
    
    public function __construct($idKelas, $dayaTampung)
    {
        $this->idKelas      = $idKelas;
        $this->dayaTampung  = $dayaTampung;
    }

}