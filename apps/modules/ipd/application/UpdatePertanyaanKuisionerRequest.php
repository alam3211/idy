<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\PertanyaanKuisionerId;

class UpdatePertanyaanKuisionerRequest
{
    public $isi;
    public $isiInggris;
    public $pertanyaanId;

    public function __construct($isi, $isiInggris, $id)
    {
        $this->pertanyaanId = new PertanyaanKuisionerId($id);
        $this->isi          = $isi;
        $this->isiInggris   = $isiInggris;
    }

}