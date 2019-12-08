<?php

namespace Idy\Ipd\Application;

class DeletePertanyaanJawabanKuisionerRequest
{
    public $array_of_id=array();

    public function __construct($array)
    {
        $this->array_of_id = $array;
    }

    public function addId($id){
        array_push($this->array_of_id, $id);
    }
}