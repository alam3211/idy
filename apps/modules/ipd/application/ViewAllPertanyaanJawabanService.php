<?php

namespace Idy\Ipd\Application;


use Idy\Ipd\Application\ViewPertanyaanJawabanRespond;
use Idy\Ipd\Domain\Model\KuisionerRepository;

class ViewAllPertanyaanJawabanService{

    private $kuisionerRepository;

    public function __construct(KuisionerRepository $kuisionerRepository){
        $this->kuisionerRepository = $kuisionerRepository;
    }

    public function execute(){
        try{
            $kuisioner_with_jawaban = $this->kuisionerRepository->allPertanyaanWithJawaban();
            return new ViewPertanyaanJawabanRespond($kuisioner_with_jawaban,null);
        }catch(Execption $e){
            return new ViewPertanyaanJawabanRespond(null, $e);
        }
    }
}