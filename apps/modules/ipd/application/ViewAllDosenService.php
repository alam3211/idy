<?php

namespace Idy\Ipd\Application;


use Idy\Ipd\Application\ViewAllDosenRespond;

use Idy\Ipd\Domain\Model\IpdRepository;

class ViewAllDosenService{

    private $ipdRepository;

    public function __construct(IpdRepository $ipdRepository)
    {
        $this->ipdRepository = $ipdRepository;
    }

    public function execute(){
        try{

            $allDosen = $this->ipdRepository->allDosen();
            return new ViewAllDosenRespond($allDosen,null);
        }catch(Execption $e){
            return new ViewAllDosenRespond(null, $e);
        }
    }
}