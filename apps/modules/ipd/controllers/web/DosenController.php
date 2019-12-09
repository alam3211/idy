<?php

namespace Idy\Ipd\Controllers\Web;

use Idy\Ipd\Application\CreateJawabanKuisionerRequest;
use Idy\Ipd\Application\CreateJawabanKuisionerService;
use Idy\Ipd\Application\CreatePertanyaanKuisionerService;
use Idy\Ipd\Application\CreatePertanyaanKuisionerRequest;
use Idy\Ipd\Application\ViewAllPertanyaanJawabanDosenService;
use Idy\Ipd\Application\ViewAllPertanyaanJawabanMatkulService;
use Idy\Ipd\Application\ViewPertanyaanJawabanByPertanyaanIdService;
use Idy\Ipd\Application\ViewPertanyaanJawabanByPertanyaanIdRequest;
use Idy\Ipd\Application\ViewKelasbyDosenService;
use Phalcon\Mvc\Controller;

class DosenController extends Controller
{
    private $pertanyaanRepository;
    private $jawabanRepository;
    private $ipdRepository;
    private $createPertanyaanKuisionerService;
    private $createJawabanKuisionerService;

    public function initialize(){
        $this->pertanyaanRepository                     = $this->di->getShared('sql_pertanyaan_repository');
        $this->jawabanRepository                        = $this->di->getShared('sql_jawaban_repository');
        $this->ipdRepository                            = $this->di->getShared('sql_ipd_repository');
        $this->viewAllPertanyaanJawabanDosenService     = new ViewAllPertanyaanJawabanDosenService($this->pertanyaanRepository);
        $this->viewAllPertanyaanJawabanMatkulService    = new ViewAllPertanyaanJawabanMatkulService($this->pertanyaanRepository);
        $this->viewKelasbyDosenService                 = new ViewKelasbyDosenService($this->ipdRepository);
        $this->viewPertanyaanJawabanService             = new ViewPertanyaanJawabanByPertanyaanIdService($this->pertanyaanRepository);
    }

    public function indexAction()
    {
        $kelasOptions                = $this->viewKelasbyDosenService->execute();
        $this->view->kelasOptions    = $kelasOptions->kelas;
        $this->view->pick('dosen/index');
        return;
    }

    public function indexKuisionerDosenAction()
    {
        $respond                = $this->viewAllPertanyaanJawabanDosenService->execute();
        $this->view->title      = "Dosen";
        $this->view->respond    = $respond->pertanyaan_with_jawaban;
        $this->view->pick('dosen/kuisioner/index');
    }

    public function indexKuisionerMatkulAction()
    {
        $respond                = $this->viewAllPertanyaanJawabanMatkulService->execute();
        $this->view->title      = "Mata Kuliah";
        $this->view->respond    = $respond->pertanyaan_with_jawaban;
        $this->view->pick('dosen/kuisioner/index');
        return;
    }
}
