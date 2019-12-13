<?php

namespace Idy\Ipd\Domain\Model;

use Idy\Ipd\Domain\Model\JawabanKuisioner;
use Idy\Ipd\Domain\Model\PertanyaanKuisioner;
use Idy\Ipd\Domain\Model\PertanyaanKuisionerId;

interface KelasRepository
{
    public function getKelasById($id);
}