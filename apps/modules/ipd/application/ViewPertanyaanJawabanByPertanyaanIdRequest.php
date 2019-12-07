<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\PertanyaanKuisionerId;

class ViewPertanyaanJawabanByPertanyaanIdRequest
{
    public $id;
    public function __construct(PertanyaanKuisionerId $pertanyaanKuisionerId)
    {
        $this->pertanyaanKuisionerId = $pertanyaanKuisionerId;
    }

}