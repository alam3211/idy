<?php

namespace Idy\Ipd\Application;


use Idy\Ipd\Application\ViewKelasbyDosenRespond;
use Idy\Ipd\Domain\Model\FrsRepository;
use Idy\Ipd\Domain\Model\IpdRepository;
use Idy\Ipd\Domain\Model\JenisPertanyaan;
use Idy\Ipd\Domain\Model\KelasRepository;
use Idy\Ipd\Domain\Model\KuisonerRepository;
use Idy\Ipd\Domain\Model\Mahasiswa;
use Idy\Ipd\Domain\Model\PertanyaanRepository;

class ViewFormKuisonerDosenService{

    private $pertanyaanRepository;
    private $kelasRepository;

    public function __construct(PertanyaanRepository $pertanyaanRepository, KelasRepository $kelasRepository)
    {
        $this->pertanyaanRepository = $pertanyaanRepository;
        $this->kelasRepository = $kelasRepository;
    }

    public function execute(ViewFormKuisonerDosenRequest $request){
        try{
            $kuisioner_with_jawaban = $this->pertanyaanRepository->allPertanyaanWithJawaban(new JenisPertanyaan(1));
            $detailKelas = $this->kelasRepository->getKelasById($request->idKelas);
            return new ViewFormKuisonerKelasRespond($kuisioner_with_jawaban,$detailKelas,null);
        }catch(Execption $e){
            return new ViewFormKuisonerKelasRespond(null,null, $e);
        }
    }
}