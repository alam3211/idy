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

class AdminController extends Controller
{

    private $pertanyaanRepository;
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

    public function createDosenAction(){
        $this->view->pick('admin/dosen/create');
        return;
    }

    public function storeDosenAction(){
        $isi        = $this->request->getPost('isi');
        $isiInggris = $this->request->getPost('isiInggris');

        $jawaban_collection         = $this->request->getPost('jawaban');
        $jawabanInggris_collection  = $this->request->getPost('jawabanInggris');
        $bobot_collection           = $this->request->getPost('bobot');

        $request = new CreatePertanyaanKuisionerRequest($isi, $isiInggris, 1);
        
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
        $respond = $this->viewAllPertanyaanJawabanDosenService->execute();
        $this->view->respond = $respond->pertanyaan_with_jawaban;
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