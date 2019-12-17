<?php

namespace Idy\Ipd\Application;


use Idy\Ipd\Application\ViewCatatanKuisionerbyKelasRespond;
use Idy\Ipd\Domain\Model\KuisonerRepository;
use Idy\Ipd\Domain\Model\CalculateIpd;

class ViewCatatanKuisionerbyKelasService{

    private $kuisonerRepository;

    public function __construct(KuisonerRepository $kuisonerRepository)
    {
        $this->kuisonerRepository = $kuisonerRepository;
    }

    public function execute($request){
        try{
            $allCatatanKuisioner = $this->kuisonerRepository->allKuisonerKelasbyKelasId($request);
    
            return new ViewCatatanKuisionerbyKelasRespond($allCatatanKuisioner,null);
        }catch(Execption $e){
            return new ViewCatatanKuisionerbyKelasRespond(null, $e);
        }
    }
}