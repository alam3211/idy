<?php

namespace Idy\Ipd\Domain\Model;

use Idy\idea\Domain\Model\JawabanKuisioner;
use Idy\idea\Domain\Model\PertanyaanKuisioner;

interface KuisionerRepository
{
    public function save(PertanyaanKuisioner $idea);
    
    public function allPertanyaanKuisioner();
}