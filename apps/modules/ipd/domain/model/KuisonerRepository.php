<?php

namespace Idy\Ipd\Domain\Model;

use Idy\Ipd\Domain\Model\JawabanKuisioner;
use Idy\Ipd\Domain\Model\PertanyaanKuisioner;
use Idy\Ipd\Domain\Model\PertanyaanKuisionerId;

interface KuisonerRepository
{
    public function getKuisonerDosenMahasiswaId(Mahasiswa $mahasiswa);
    public function getKuisonerKelasMahasiswaId(Mahasiswa $mahasiswa);
    public function allKuisonerKelasbyKelasId($id);
    public function submitForm(Kuisoner $kuisioner);
}