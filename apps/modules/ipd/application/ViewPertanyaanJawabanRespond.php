<?php

namespace Idy\Ipd\Application;

class ViewPertanyaanJawabanRespond
{
    public $pertanyaan_with_jawaban;
    public $errors;

    public function __construct($pertanyaan_with_jawaban = null , $errors = null){
        $this->pertanyaan_with_jawaban = $pertanyaan_with_jawaban;
        $this->errors = $errors;
    }

    public function pertanyaanJawabanKuisioner(){
        return $this->pertanyaan_with_jawaban;
    }

    public function errors(){
        return $this->errors;
    }

}