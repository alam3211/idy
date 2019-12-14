<?php

namespace Idy\Ipd\Domain\Model;

class CalculateIpd
{
    private $kuisioner;
    private $allKelasbyDosen;
    private $totalPeserta;
    private $totalResponden;

    public function __construct($kuisioner, $allKelasbyDosen)
    {
        $this->kuisioner = $kuisioner;
        $this->allKelasbyDosen = $allKelasbyDosen;
        $this->totalPeserta = $this->sumResponden();
        $this->totalResponden = $this->sumPeserta();
    }

    public function sumResponden(){
        $sumResponden = count($this->kuisioner);
        return $this->totalResponden = $sumResponden;
    }
    
    public function responden(){
        return $this->totalResponden;
    }

    public function sumPeserta(){
        $sumPeserta = 0;
        foreach ($this->allKelasbyDosen as $kelas) {
            $sumPeserta += $kelas['daya_tampung'];
        }
        return $this->totalPeserta = $sumPeserta;
    }

    public function peserta(){
        return $this->totalPeserta;
    }
}