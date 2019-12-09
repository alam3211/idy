<?php

namespace Idy\Ipd\Domain\Model;

class MataKuliah
{
    private $id;
    private $namaMataKuliah;
    private $kode;
    private $sks;

    public function __construct($id = null, $namaMataKuliah, $kode, $sks)
    {
        $this->id = $id;
        $this->namaMataKuliah = $namaMataKuliah;
        $this->kode = $kode;
        $this->sks = $sks;
    }

}