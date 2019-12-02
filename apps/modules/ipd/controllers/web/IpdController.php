<?php

namespace Idy\Ipd\Controllers\Web;

use Idy\Ipd\Application\CreatePertanyaanKuisionerService;
use Idy\Ipd\Application\CreatePertanyaanKuisionerRequest;

use Phalcon\Mvc\Controller;

class IpdController extends Controller
{

    private $kuisionerRepository;
    private $createPertanyaanKuisionerService;
    
    public function initialize(){
        $this->kuisionerRepository              = $this->di->getShared('sql_ipd_repository');
        $this->createPertanyaanKuisionerService = new  CreatePertanyaanKuisionerService($this->kuisionerRepository);
    }

    public function indexAction()
    {
        $this->view->pick('home');
        return;
    }

    public function addPostAction()
    {
        $isi        = $this->request->getPost('isi');
        $isiInggris = $this->request->getPost('isiInggris');

        $request = new CreatePertanyaanKuisionerRequest($isi, $isiInggris);
        
        $this->createPertanyaanKuisionerService->execute($request);
    }

}