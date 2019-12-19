<?php

namespace Idy\Ipd\Application;


use Idy\Ipd\Application\ViewKelasbyDosenRespond;
use Idy\Ipd\Domain\Model\FrsRepository;
use Idy\Ipd\Domain\Model\IpdRepository;
use Idy\Ipd\Domain\Model\Kuisoner;
use Idy\Ipd\Domain\Model\KuisonerRepository;
use Idy\Ipd\Domain\Model\Mahasiswa;

class SubmitKuisionerKelasService{

    private $kuisonerRepository;

    public function __construct(KuisonerRepository $kuisonerRepository)
    {
        $this->kuisonerRepository = $kuisonerRepository;
    }

    public function execute(SubmitKuisionerKelasRequest $request){
        try{
            $kuisonerSubmit = new Kuisoner($request->idMahasiswa,$request->idKelas,$request->jawaban, $request->bobot,$request->pertanyaan,$request->jenisKuisoner,$request->catatan);
            if($kuisonerSubmit->jawabanKosong() || $kuisonerSubmit->catatanKosong()){
                return false;
            }
            $kuisoner = $this->kuisonerRepository->submitForm($kuisonerSubmit);
            return $kuisoner;
        }catch(Execption $e){
            return false;
        }
    }
}