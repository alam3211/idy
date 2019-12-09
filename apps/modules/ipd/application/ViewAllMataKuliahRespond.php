<?php

namespace Idy\Ipd\Application;

class ViewAllMataKuliahRespond
{
    public $mataKuliah;
    public $errors;

    public function __construct($mataKuliah = null , $errors = null){
        $this->mataKuliah = $mataKuliah;
        $this->errors = $errors;
    }

    public function mataKuliah(){
        return $this->mataKuliah;
    }

    public function errors(){
        return $this->errors;
    }

}