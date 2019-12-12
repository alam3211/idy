<?php

namespace Idy\Ipd\Domain\Model;

use Idy\Ipd\Domain\Model\Dosen;
use Idy\Ipd\Domain\Model\Kelas;

class StatistikKuisioner
{
    private $dosen;
    private $kelas;
    private $rataan;
    private $jumlahPopulasi;
    private $jumlahResponden;
    
    public function __construct($rataan, $jumlahPopulasi, $jumlahResponden,  Dosen $dosen = null, Kelas $kelas = null)
    {
        $this->dosen = $dosen;
        $this->kelas = $kelas;
        $this->rataan = $rataan;
        $this->jumlahPopulasi = $jumlahPopulasi;
        $this->jumlahResponden = $jumlahResponden;
    }
    
    public function id(){
        return $this->id;
    }

    public function dosen(){
        return $this->dosen;
    }
    
    public function kelas(){
        return $this->kelas;
    }

    public function rataan()
    {
        return $this->rataan;
    }

    public function jumlahPopulasi()
    {
        return $this->jumlahPopulasi;
    }

    public function jumlahResponden()
    {
        return $this->jumlahResponden;
    }

    public static function makeStatistikKuisioner($rataan, $jumlahPopulasi, $jumlahResponden,  Dosen $dosen = null, Kelas $kelas = null)
    {
        $statistikKuisoner = new StatistikKuisioner($rataan, $jumlahPopulasi, $jumlahResponden, $dosen = null, $kelas = null);
        return $statistikKuisoner;
    }
}