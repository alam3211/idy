<?php

namespace Idy\Ipd\Application;

class ViewKuisonerDosenByMahasiswaRequest
{
    public $id;
    public $nrp;
    public $nama;
    
    public function __construct($id, $nrp, $nama)
    {
        $this->id          = $id;
        $this->nrp   = $nrp;
        $this->nama        = $nama;
    }

}