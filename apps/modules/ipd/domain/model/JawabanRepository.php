<?php

namespace Idy\Ipd\Domain\Model;

use Idy\ipd\Domain\Model\JawabanKuisioner;
use Idy\ipd\Domain\Model\PertanyaanKuisioner;

interface KuisionerRepository
{
    public function save(JawabanKuisioner $jawabanKuisioner, PertanyaanKuisioner $pertanyaanKuisioner);
    
    public function byPertanyaan(PertanyaanKuisioner $pertanyaanKuisioner);
}