<?php

namespace Idy\Ipd\Domain\Model;

use Idy\Ipd\Domain\Model\JawabanKuisioner;
use Idy\Ipd\Domain\Model\PertanyaanKuisioner;

interface JawabanRepository
{
    public function save(JawabanKuisioner $jawabanKuisioner, PertanyaanKuisioner $pertanyaanKuisioner);
    
    public function byPertanyaan(PertanyaanKuisioner $pertanyaanKuisioner);
}