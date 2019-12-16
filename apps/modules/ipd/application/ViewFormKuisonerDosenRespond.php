<?php

namespace Idy\Ipd\Application;

class ViewFormKuisonerDosenRespond
{
    public $daftarPertanyaan;
    public $detailKelas;
    public $errors;

    public function __construct($daftarPertanyaan = null, $detailKelas = null , $errors = null){
        $this->daftarPertanyaan = $daftarPertanyaan;
        $this->detailKelas = $detailKelas;
        $this->errors = $errors;
    }

    public function daftarPertanyaan(){
        return $this->daftarPertanyaan;
    }

    public function detailKelas(){
        return $this->detailKelas;
    }

    public function errors(){
        return $this->errors;
    }

}