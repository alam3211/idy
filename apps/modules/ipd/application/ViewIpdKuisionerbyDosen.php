<?php

namespace Idy\Ipd\Application;


use Idy\Ipd\Application\ViewStatistikKuisionerRespond;
use Idy\Ipd\Domain\Model\IpdRepository;

class ViewIpdKuisionerbyDosen{

    private $ipdRepository;

    public function __construct(IpdRepository $ipdRepository)
    {
        $this->ipdRepository = $ipdRepository;
    }

    public function execute(){
        try{
            $ipd = $this->ipdRepository->ipdbyDosen();
            return new ViewStatistikKuisionerRespond($ipd,null);
        }catch(Execption $e){
            return new ViewStatistikKuisionerRespond(null, $e);
        }
    }
}