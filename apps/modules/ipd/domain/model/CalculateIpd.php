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
        if ($this->totalResponden > 0 && $totalPertanyaan > 0) {
            $result = floatval($totalBobot/($totalPertanyaan * $this->totalResponden * $maxBobot) * $normalize);
        }
        $result = number_format($result, 2);
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