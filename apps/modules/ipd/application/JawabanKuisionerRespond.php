<?php

namespace Idy\Ipd\Application;

class JawabanKuisionerRespond
{
    public $jawabanKuisioner;
    public $errors;

    public function __construct($pertanyaanKuisioner = null , $errors = null){
        $this->jawabanKuisioner = $pertanyaanKuisioner;
        $this->errors = $errors;
    }

    public function jawabanKuisioner(){
        return $this->jawabanKuisioner;
    }

    public function errors(){
        return $this->errors;
    }

}