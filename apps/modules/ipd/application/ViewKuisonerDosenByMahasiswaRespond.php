<?php

namespace Idy\Ipd\Application;

class ViewKuisonerDosenByMahasiswaRespond
{
    public $daftarKuisonerDosen;
    public $errors;

    public function __construct($daftarKuisonerDosen = null , $errors = null){
        $this->daftarKuisonerDosen = $daftarKuisonerDosen;
        $this->errors = $errors;
    }

    public function daftarKuisonerDosen(){
        return $this->daftarKuisonerDosen;
    }

    public function errors(){
        return $this->errors;
    }

}