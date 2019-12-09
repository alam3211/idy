<?php

namespace Idy\Ipd\Application;

class ViewAllDosenRespond
{
    public $dosen;
    public $errors;

    public function __construct($dosen = null , $errors = null){
        $this->dosen = $dosen;
        $this->errors = $errors;
    }

    public function dosen(){
        return $this->dosen;
    }

    public function errors(){
        return $this->errors;
    }

}