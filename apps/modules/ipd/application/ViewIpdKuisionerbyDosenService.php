<?php

namespace Idy\Ipd\Application;


use Idy\Ipd\Application\ViewStatistikKuisionerRespond;
use Idy\Ipd\Domain\Model\IpdRepository;
use Idy\Ipd\Domain\Model\CalculateIpd;

class ViewIpdKuisionerbyDosenService{

    private $ipdRepository;

    public function __construct(IpdRepository $ipdRepository)
    {
        $this->ipdRepository = $ipdRepository;
    }

    public function execute(){
        try{
            $ipd                = $this->ipdRepository->kuisionerbyDosen();
            $allKelasbyDosen    = $this->ipdRepository->kelasbyDosen();
            
            $calcIpd = new CalculateIpd($ipd, $allKelasbyDosen);

            return new ViewStatistikKuisionerRespond($calcIpd,null);
        }catch(Execption $e){
            return new ViewStatistikKuisionerRespond(null, $e);
        }
    }
}