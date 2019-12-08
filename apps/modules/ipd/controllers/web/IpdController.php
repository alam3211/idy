<?php

namespace Idy\Ipd\Controllers\Web;

use Idy\Ipd\Application\CreateJawabanKuisionerRequest;
use Idy\Ipd\Application\CreateJawabanKuisionerService;
use Idy\Ipd\Application\CreatePertanyaanKuisionerService;
use Idy\Ipd\Application\CreatePertanyaanKuisionerRequest;
use Idy\Ipd\Application\ViewAllPertanyaanJawabanService;
use Idy\Ipd\Application\ViewPertanyaanJawabanByPertanyaanIdService;
use Idy\Ipd\Application\ViewPertanyaanJawabanByPertanyaanIdRequest;
use Idy\Ipd\Domain\Model\PertanyaanKuisionerId;
use Phalcon\Mvc\Controller;

class IpdController extends Controller
{

    private $kuisionerRepository;
    private $jawabanRepository;
    private $createPertanyaanKuisionerService;
    private $createJawabanKuisionerService;
    
    public function initialize(){
        $this->kuisionerRepository              = $this->di->getShared('sql_ipd_repository');
        $this->jawabanRepository                = $this->di->getShared('sql_jawaban_repository');
        $this->createPertanyaanKuisionerService = new  CreatePertanyaanKuisionerService($this->kuisionerRepository);
        $this->createJawabanKuisionerService    = new CreateJawabanKuisionerService($this->jawabanRepository);
        $this->viewAllPertanyaanJawabanService  = new ViewAllPertanyaanJawabanService($this->kuisionerRepository);
        $this->viewPertanyaanJawabanService     = new ViewPertanyaanJawabanByPertanyaanIdService($this->kuisionerRepository);
    }

    public function indexAction(){
        $this->view->pick('landing-page');
        return;
    }
}