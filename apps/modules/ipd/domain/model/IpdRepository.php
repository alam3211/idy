<?php

namespace Idy\Ipd\Domain\Model;

use Idy\ipd\Domain\Model\JawabanKuisioner;
use Idy\ipd\Domain\Model\PertanyaanKuisioner;
use Idy\Ipd\Domain\Model\PertanyaanKuisionerId;  

interface IpdRepository
{
    public function kelasbyDosen();

    public function ipdbyDosen();

    public function ipmkbyDosen();
    
    public function allMataKuliah();

    public function allDosen();
}