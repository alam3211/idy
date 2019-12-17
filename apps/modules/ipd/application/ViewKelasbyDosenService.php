<?php

namespace Idy\Ipd\Application;


use Idy\Ipd\Application\ViewKelasbyDosenRespond;
use Idy\Ipd\Domain\Model\KelasRepository;

class ViewKelasbyDosenService{

    private $kelasRepository;

    public function __construct(KelasRepository $kelasRepository)
    {
        $this->kelasRepository = $kelasRepository;
    }

    public function execute(){
        try{
            $kelas = $this->kelasRepository->kelasbyDosen();
            return new ViewKelasbyDosenRespond($kelas,null);
        }catch(Execption $e){
            return new ViewKelasbyDosenRespond(null, $e);
        }
    }
}