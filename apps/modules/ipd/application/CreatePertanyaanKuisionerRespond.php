<?php

namespace Idy\Ipd\Application;

class CreatePertanyaanKuisionerRespond
{
    public $pertanyaanKuisioner;
    public $errors;

    public function __construct($pertanyaanKuisioner = null , $errors = null){
        $this->pertanyaanKuisioner = $ideas;
        $this->errors = $errors;
    }

    public function pertanyaanKuisioner(){
        return $this->pertanyaanKuisioner;
    }

    public function errors(){
        return $this->errors;
    }

}