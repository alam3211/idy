<?php

namespace Idy\Ipd\Domain\Model;

class StatistikKuisioner
{
    private $rataan;
    private $jumlahPopulasi;
    private $jumlahResponden;
    
    public function __construct($rataan, $jumlahPopulasi, $jumlahResponden)
    {
        $this->rataan = $rataan;
        $this->jumlahPopulasi = $jumlahPopulasi;
        $this->jumlahResponden = $jumlahResponden;
    }

    public function rataan(){
        return $this->rataan;
    }

    public function jumlahPopulasi(){
        return $this->jumlahPopulasi;
    }

    public function jumlahResponden(){
        return $this->jumlahResponden;
    }

    public static function makeStatistikKuisioner($rataan, $jumlahPopulasi, $jumlahResponden)
    {
        $statistikKuisioner = new StatistikKuisioner($rataan, $jumlahPopulasi, $jumlahResponden);
        return $statistikKuisioner;
    }
}