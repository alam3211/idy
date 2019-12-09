<?php

namespace Idy\Ipd\Application;


use Idy\Ipd\Application\ViewAllDosenRespond;

use Idy\Ipd\Domain\Model\IpdRepository;

class ViewAllMataKuliahService{

    private $ipdRepository;

    public function __construct(IpdRepository $ipdRepository)
    {
        $this->ipdRepository = $ipdRepository;
    }

    public function execute(){
        try{

            $allMatkul = $this->ipdRepository->allMataKuliah();
            return new ViewAllMataKuliahRespond($allMatkul,null);
        }catch(Execption $e){
            return new ViewAllMataKuliahRespond(null, $e);
        }
    }
}