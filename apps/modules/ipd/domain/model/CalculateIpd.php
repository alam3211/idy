<?php

namespace Idy\Ipd\Domain\Model;

class CalculateIpd
{
    private $kuisioner;
    private $totalPeserta;
    private $totalResponden;
    private $ipd;
    private $ipmk;

    public function __construct($kuisioner, $dayaTampung)
    {
        $this->kuisioner = $kuisioner;
        $this->totalPeserta = $dayaTampung;
        $this->totalResponden = $this->sumResponden();
        $this->ipd = $this->calcIndexPrestasi("Dosen");
        $this->ipmk = $this->calcIndexPrestasi("Mata_Kuliah");
    }

    public function calcIndexPrestasi($jenisKuisioner){
        $result = 0;
        foreach ($this->kuisioner as $item) {
            if ($item['jenis_kuisioner'] == $jenisKuisioner) {
                foreach ($item['respon_kuisioner'] as $respon){
                    $result += $respon['bobot'];
                }
            }
        }
        return $result;
    }

    public function sumResponden(){
        $sumResponden = count($this->kuisioner);
        return $sumResponden;
    }
    
    public function totalResponden(){
        return $this->totalResponden;
    }

    public function totalPeserta(){
        return intval($this->totalPeserta);
    }

    public function ipd(){
        return $this->ipd;
    }

    public function ipmk(){
        return $this->ipmk;
    }
}