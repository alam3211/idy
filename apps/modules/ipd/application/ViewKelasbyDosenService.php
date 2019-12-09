<?php

namespace Idy\Ipd\Application;


use Idy\Ipd\Application\ViewKelasbyDosenRespond;
use Idy\Ipd\Domain\Model\IpdRepository;

class ViewKelasbyDosenService{

    private $ipdRepository;

    public function __construct(IpdRepository $ipdRepository)
    {
        $this->ipdRepository = $ipdRepository;
    }

    public function execute(){
        try{
            $kelas = $this->ipdRepository->kelasbyDosen();
            return new ViewKelasbyDosenRespond($kelas,null);
        }catch(Execption $e){
            return new ViewKelasbyDosenRespond(null, $e);
        }
    }
}