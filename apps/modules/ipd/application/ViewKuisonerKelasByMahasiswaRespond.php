<?php

namespace Idy\Ipd\Application;

class ViewKuisonerKelasByMahasiswaRespond
{
    public $daftarKuisonerKelas;
    public $errors;

    public function __construct($daftarKuisonerKelas = null , $errors = null){
        $this->daftarKuisonerKelas = $daftarKuisonerKelas;
        $this->errors = $errors;
    }

    public function daftarKuisonerKelas(){
        return $this->daftarKuisonerKelas;
    }

    public function errors(){
        return $this->errors;
    }

}