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
use Phalcon\Mvc\Controller;

class IpdController extends Controller
{

    private $kuisionerRepository;
    private $jawabanRepository;
    private $createPertanyaanKuisionerService;
    private $createJawabanKuisionerService;
    
    public function initialize(){
        $this->pertanyaanRepository              = $this->di->getShared('sql_pertanyaan_repository');
        $this->jawabanRepository                = $this->di->getShared('sql_jawaban_repository');
        $this->createPertanyaanKuisionerService = new  CreatePertanyaanKuisionerService($this->pertanyaanRepository);
        $this->createJawabanKuisionerService    = new CreateJawabanKuisionerService($this->jawabanRepository);
        $this->viewAllPertanyaanJawabanDosenService  = new ViewAllPertanyaanJawabanDosenService($this->pertanyaanRepository);
        $this->viewAllPertanyaanJawabanMatkulService  = new ViewAllPertanyaanJawabanMatkulService($this->pertanyaanRepository);
        $this->viewPertanyaanJawabanService     = new ViewPertanyaanJawabanByPertanyaanIdService($this->pertanyaanRepository);
    }

    public function indexAction(){
        $this->view->pick('landing-page');
        return;
    }
}