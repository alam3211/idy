<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\PertanyaanKuisionerId;

class UpdatePertanyaanJawabanKuisionerRequest
{
    public $isi;
    public $isiInggris;
    public $pertanyaanId;
    public $jawabanId_collection;
    public $jawaban_collection;
    public $jawabanInggris_collection;
    public $bobot_collection;

    public function __construct($id, $isi, $isiInggris,  $jawabanId , $jawaban ,$jawabanInggris, $bobot)
    {
        $this->pertanyaanId                 = new PertanyaanKuisionerId($id);
        $this->isi                          = $isi;
        $this->isiInggris                   = $isiInggris;
        $this->jawaban_collection           = $jawaban;
        $this->jawabanInggris_collection    = $jawabanInggris;
        $this->jawabanId_collection         = $jawabanId;
        $this->bobot_collection             = $bobot;
    }

}