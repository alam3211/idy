<?php

namespace Idy\Ipd\Domain\Model;

class CalculateIpd
{
    private $kuisioner;
    private $totalPeserta;
    private $totalRespondenIpd;
    private $totalRespondenIpmk;
    private $ipd;
    private $ipmk;

    public function __construct($kuisioner, $dayaTampung)
    {
        $this->kuisioner = $kuisioner;
        $this->totalPeserta = $dayaTampung;
        $this->totalRespondenIpd = $this->sumResponden("Dosen");
        $this->totalRespondenIpmk = $this->sumResponden("Mata_Kuliah");
        $this->ipd = $this->calcIndexPrestasi("Dosen");
        $this->ipmk = $this->calcIndexPrestasi("Mata_Kuliah");
    }

    public function calcIndexPrestasi($jenisKuisioner){
        $result = floatval(0.0);
        $isCounted = false;
        $totalBobot = 0;
        $totalPertanyaan = 0;
        $maxBobot = 4;
        $normalize = floatval(4.0);

        foreach ($this->kuisioner as $item) {
            if ($item['jenis_kuisioner'] == $jenisKuisioner) {
                if ($isCounted == false) {
                    $totalPertanyaan = count($item['respon_kuisioner']);
                    $isCounted = true;
                }
                foreach ($item['respon_kuisioner'] as $respon){
                    $totalBobot += $respon['bobot'];
                }
            }
        }

        if ($this->totalRespondenIpd > 0 || $this->totalRespondenIpmk > 0 && $totalPertanyaan > 0) {
            if ($item['jenis_kuisioner'] == "Dosen") 
            $result = floatval($totalBobot/($totalPertanyaan * $this->totalRespondenIpd * $maxBobot) * $normalize);
            else
            $result = floatval($totalBobot/($totalPertanyaan * $this->totalRespondenIpmk * $maxBobot) * $normalize);
        }
        $result = number_format($result, 2);
        return $result;
    }

    public function sumResponden($jenisKuisioner){
        $sumResponden = 0;
        foreach ($this->kuisioner as $item) {
            if ($item['jenis_kuisioner'] == $jenisKuisioner) {
                $sumResponden++;
            }
        }
        return $sumResponden;
    }
    
    public function totalRespondenIpd(){
        return $this->totalRespondenIpd;
    }

    public function totalRespondenIpmk(){
        return $this->totalRespondenIpmk;
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