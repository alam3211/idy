<?php

namespace Idy\Ipd\Application;

class DeleteJawabanKuisionerRequest
{
    public $array_of_id=array();

    public function __construct()
    {
    }

    public function addId($id){
        array_push($this->array_of_id, $id);
    }
}