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

class AdminController extends Controller
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

    public function addDosenAction(){
        $isi        = $this->request->getPost('isi');
        $isiInggris = $this->request->getPost('isiInggris');

        $jawaban_collection         = $this->request->getPost('jawaban');
        $jawabanInggris_collection  = $this->request->getPost('jawabanInggris');
        $bobot_collection           = $this->request->getPost('bobot');

        $request = new CreatePertanyaanKuisionerRequest($isi, $isiInggris);
        
        try{
            $respond = $this->createPertanyaanKuisionerService->execute($request);
            if(!is_null($respond->pertanyaanKuisioner)){
                foreach($jawaban_collection as $key => $item){
                    //these collection must have same length
                    $jawabanRequest = new CreateJawabanKuisionerRequest($item, $jawabanInggris_collection[$key], $bobot_collection[$key], $respond->pertanyaanKuisioner);

                    $jawabanRespond = $this->createJawabanKuisionerService->execute($jawabanRequest);

                    if(!is_null($jawabanRespond->jawabanKuisioner)){
                        $respond->pertanyaanKuisioner->addJawaban($jawabanRespond->jawabanKuisioner);
                    }
                }
            }
            return $this->response->redirect('/');
        }catch(Exception $e){

        }
    }

    public function listDosenAction(){
        $respond = $this->viewAllPertanyaanJawabanService->execute();
        $this->view->respond = $respond;
        // dd($respond);
        $this->view->pick('admin/dosen/index');
    }

    public function editDosenAction(){
        $request = new ViewPertanyaanJawabanByPertanyaanIdRequest(new PertanyaanKuisionerId($this->dispatcher->getParam('id')));
        $respond = $this->viewPertanyaanJawabanService->execute($request);
        dd($respond);
    }

    public function updateDosenAction(){

    }
}