<?php

namespace Idy\Ipd\Domain\Model;

use Idy\ipd\Domain\Model\JawabanKuisioner;
use Idy\ipd\Domain\Model\PertanyaanKuisioner;
use Idy\Ipd\Domain\Model\PertanyaanKuisionerId;  

interface PertanyaanRepository
{
    public function save(PertanyaanKuisioner $pertanyaanKuisioner);
    
    public function allPertanyaanKuisioner();

    public function allPertanyaanWithJawaban(JenisPertanyaan $jenis);

    public function pertanyaanWithJawabanByPertanyaanId(PertanyaanKuisionerId $pertanyaanId);

    public function update(PertanyaanKuisionerId $pertanyaanId, $isi, $isiInggris);

    public function destroy($array_of_id);
}