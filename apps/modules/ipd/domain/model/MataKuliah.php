<?php

namespace Idy\Ipd\Domain\Model;

class MataKuliah
{
    private $id;
    private $namaMataKuliah;
    private $kode;
    
    public function __construct($id = null, $namaMataKuliah, $kode)
    {
        $this->id = $id;
        $this->namaMataKuliah = $namaMataKuliah;
        $this->kode = $kode;
    }

}