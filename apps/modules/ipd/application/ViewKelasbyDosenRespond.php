<?php

namespace Idy\Ipd\Application;

class ViewKelasbyDosenRespond
{
    public $kelas;
    public $errors;

    public function __construct($kelas = null , $errors = null){
        $this->kelas = $kelas;
        $this->errors = $errors;
    }

    public function kelas(){
        return $this->kelas;
    }

    public function errors(){
        return $this->errors;
    }

}