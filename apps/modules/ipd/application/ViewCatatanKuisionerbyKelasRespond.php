<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\CalculateIpd;

class ViewCatatanKuisionerbyKelasRespond
{
    public $catatanKuisoner;
    public $errors;

    public function __construct($catatanKuisoner = null , $errors = null){
        $this->catatanKuisoner = $catatanKuisoner;
        $this->errors = $errors;
    }

    public function catatanKuisoner(){
        return $this->catatanKuisoner;
    }

    public function errors(){
        return $this->errors;
    }

}