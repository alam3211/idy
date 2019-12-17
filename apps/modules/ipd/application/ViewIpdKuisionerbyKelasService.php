<?php

namespace Idy\Ipd\Application;


use Idy\Ipd\Application\ViewIpdKuisionerbyKelasRespond;
use Idy\Ipd\Application\KuisionerNotExceedLimitException;

use Idy\Ipd\Domain\Model\IpdRepository;
use Idy\Ipd\Domain\Model\CalculateIpd;

class ViewIpdKuisionerbyKelasService{

    private $ipdRepository;

    public function __construct(IpdRepository $ipdRepository)
    {
        $this->ipdRepository = $ipdRepository;
    }

    public function execute($request){
        try{
            $allKuisioner = $this->ipdRepository->kuisionerbyKelas($request);

            $calcIpd = new CalculateIpd($allKuisioner, $request->dayaTampung);
    
            if (!$calcIpd->respondenMinimum()) {
                return new KuisionerNotExceedLimitException(
                    "Total responden belum memenuhi batas standar minimum",200
                );
            }
            return new ViewIpdKuisionerbyKelasRespond($calcIpd,null);
        }catch(Execption $e){
            return new ViewIpdKuisionerbyKelasRespond(null, $e);
        }
    }
}