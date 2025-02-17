<?php

namespace Idy\Ipd\Application;


use Idy\Ipd\Application\ViewPertanyaanJawabanRespond;
use Idy\Ipd\Domain\Model\PertanyaanRepository;

class ViewPertanyaanJawabanByPertanyaanIdService{

    private $pertanyaanRepository;

    public function __construct(PertanyaanRepository $pertanyaanRepository)
    {
        $this->pertanyaanRepository = $pertanyaanRepository;
    }

    public function execute(ViewPertanyaanJawabanByPertanyaanIdRequest $request){
        try{
            $kuisioner_with_jawaban = $this->pertanyaanRepository->pertanyaanWithJawabanByPertanyaanId($request->pertanyaanKuisionerId);
            return new ViewPertanyaanJawabanRespond($kuisioner_with_jawaban,null);
        }catch(Execption $e){
            return new ViewPertanyaanJawabanRespond(null, $e);
        }
    }
}