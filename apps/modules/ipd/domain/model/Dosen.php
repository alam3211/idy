<?php

namespace Idy\Ipd\Domain\Model;

class Dosen
{
    private $id;
    private $namaDosen;
    
    public function __construct($id = null, $namaDosen)
    {
        $this->id = $id;
        $this->namaDosen = $namaDosen;
    }

}