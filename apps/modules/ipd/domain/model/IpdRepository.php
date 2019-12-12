<?php

namespace Idy\Ipd\Domain\Model;

use Idy\ipd\Domain\Model\JawabanKuisioner;
use Idy\ipd\Domain\Model\PertanyaanKuisioner;
use Idy\Ipd\Domain\Model\PertanyaanKuisionerId;  

interface IpdRepository
{

    public function kelasbyDosen();
    
    public function allMataKuliah();

    public function allDosen();

    public function statistikIPD();

    public function statistikIPMK();
}