<?php

namespace Idy\Ipd\Application;


use Idy\Ipd\Application\ViewKelasbyDosenRespond;
use Idy\Ipd\Domain\Model\FrsRepository;
use Idy\Ipd\Domain\Model\IpdRepository;
use Idy\Ipd\Domain\Model\KuisonerRepository;
use Idy\Ipd\Domain\Model\Mahasiswa;

class ViewKuisonerDosenByMahasiswaService{

    private $kuisonerRepository;

    public function __construct(KuisonerRepository $kuisonerRepository)
    {
        $this->kuisonerRepository = $kuisonerRepository;
    }

    public function execute(ViewKuisonerDosenByMahasiswaRequest $request){
        try{
            $mahasiswa = new Mahasiswa($request->nrp,$request->nama,$request->id);
            $kuisoner = $this->kuisonerRepository->getKuisonerDosenMahasiswaId($mahasiswa);
            return new ViewKuisonerDosenByMahasiswaRespond($kuisoner,null);
        }catch(Execption $e){
            return new ViewKuisonerDosenByMahasiswaRespond($kuisoner,null);
        }
    }
}