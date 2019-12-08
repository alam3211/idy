<?php

namespace Idy\Ipd\Application;

class PertanyaanKuisionerRespond
{
    public $pertanyaanKuisioner;
    public $errors;

    public function __construct($pertanyaanKuisioner = null , $errors = null){
        $this->pertanyaanKuisioner = $pertanyaanKuisioner;
        $this->errors = $errors;
    }

    public function pertanyaanKuisioner(){
        return $this->pertanyaanKuisioner;
    }

    public function errors(){
        return $this->errors;
    }

}