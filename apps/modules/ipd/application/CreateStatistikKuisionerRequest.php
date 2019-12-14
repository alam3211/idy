<?php

namespace Idy\Ipd\Application;

class CreateJawabanKuisionerRequest
{

    public $rataan;
    public $jumlahPopulasi;
    public $jumlahResponden;

    public function __construct($rataan, $jumlahPopulasi, $jumlahResponden)
    {
        $this->rataan = $rataan;
        $this->jumlahPopulasi = $jumlahPopulasi;
        $this->jumlahResponden = $jumlahResponden;
    }

}