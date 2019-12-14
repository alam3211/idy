<?php

namespace Idy\Ipd\Application;

class ViewStatistikKuisionerRespond
{
    public $statistikKuisioner;
    public $errors;

    public function __construct($statistikKuisioner = null , $errors = null){
        $this->statistikKuisioner = $statistikKuisioner;
        $this->errors = $errors;
    }

    public function statistikKuisioner(){
        return $this->statistikKuisioner;
    }

    public function errors(){
        return $this->errors;
    }

}