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
use Idy\Ipd\Domain\Model\PertanyaanKuisionerId;
use Phalcon\Mvc\Controller;

class DosenController extends Controller
{
    private $pertanyaanRepository;
    private $jawabanRepository;
    private $createPertanyaanKuisionerService;
    private $createJawabanKuisionerService;

    public function initialize(){
        $this->pertanyaanRepository                     = $this->di->getShared('sql_pertanyaan_repository');
        $this->jawabanRepository                        = $this->di->getShared('sql_jawaban_repository');
        $this->createPertanyaanKuisionerService         = new CreatePertanyaanKuisionerService($this->pertanyaanRepository);
        $this->createJawabanKuisionerService            = new CreateJawabanKuisionerService($this->jawabanRepository);
        $this->viewAllPertanyaanJawabanDosenService     = new ViewAllPertanyaanJawabanDosenService($this->pertanyaanRepository);
        $this->viewAllPertanyaanJawabanMatkulService    = new ViewAllPertanyaanJawabanMatkulService($this->pertanyaanRepository);
        $this->viewPertanyaanJawabanService             = new ViewPertanyaanJawabanByPertanyaanIdService($this->pertanyaanRepository);
    }

    public function indexAction()
    {
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
