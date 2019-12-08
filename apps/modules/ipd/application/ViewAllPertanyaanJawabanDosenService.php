<?php

namespace Idy\Ipd\Application;


use Idy\Ipd\Application\ViewPertanyaanJawabanRespond;
use Idy\Ipd\Domain\Model\JenisPertanyaan;
use Idy\Ipd\Domain\Model\PertanyaanRepository;

class ViewAllPertanyaanJawabanDosenService{

    private $pertanyaanRepository;

    public function __construct(PertanyaanRepository $pertanyaanRepository)
    {
        $this->pertanyaanRepository = $pertanyaanRepository;
    }

    public function execute(){
        try{

            $kuisioner_with_jawaban = $this->pertanyaanRepository->allPertanyaanWithJawaban(new JenisPertanyaan(1));
            return new ViewPertanyaanJawabanRespond($kuisioner_with_jawaban,null);
        }catch(Execption $e){
            return new ViewPertanyaanJawabanRespond(null, $e);
        }
    }
}