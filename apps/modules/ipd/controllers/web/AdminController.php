<?php

namespace Idy\Ipd\Controllers\Web;

use Idy\Ipd\Application\CreateJawabanKuisionerRequest;
use Idy\Ipd\Application\CreateJawabanKuisionerService;
use Idy\Ipd\Application\CreatePertanyaanKuisionerService;
use Idy\Ipd\Application\CreatePertanyaanKuisionerRequest;
use Idy\Ipd\Application\DeletePertanyaanJawabanKuisionerRequest;
use Idy\Ipd\Application\DeletePertanyaanJawabanKuisionerService;
use Idy\Ipd\Application\UpdatePertanyaanJawabanKuisionerRequest;
use Idy\Ipd\Application\UpdatePertanyaanJawabanKuisionerService;
use Idy\Ipd\Application\ViewAllPertanyaanJawabanDosenService;
use Idy\Ipd\Application\ViewAllPertanyaanJawabanMatkulService;
use Idy\Ipd\Application\ViewPertanyaanJawabanByPertanyaanIdService;
use Idy\Ipd\Application\ViewPertanyaanJawabanByPertanyaanIdRequest;
use Idy\Ipd\Application\ViewAllDosenService;
use Idy\Ipd\Application\ViewAllMataKuliahService;

use Idy\Ipd\Domain\Model\PertanyaanKuisionerId;
use Phalcon\Mvc\Controller;

class AdminController extends Controller
{

    private $pertanyaanRepository;
    private $jawabanRepository;
    private $ipdRepository;
    private $createPertanyaanKuisionerService;
    private $createJawabanKuisionerService;
    private $updatePertanyaanJawabanKuisionerService;
    private $deletePertanyaanJawabanKuisionerService;

    public function initialize(){
        $this->pertanyaanRepository                     = $this->di->getShared('sql_pertanyaan_repository');
        $this->jawabanRepository                        = $this->di->getShared('sql_jawaban_repository');
        $this->ipdRepository                            = $this->di->getShared('sql_ipd_repository');
        $this->createPertanyaanKuisionerService         = new CreatePertanyaanKuisionerService($this->pertanyaanRepository);
        $this->createJawabanKuisionerService            = new CreateJawabanKuisionerService($this->jawabanRepository);
        $this->viewAllPertanyaanJawabanDosenService     = new ViewAllPertanyaanJawabanDosenService($this->pertanyaanRepository);
        $this->viewAllPertanyaanJawabanMatkulService    = new ViewAllPertanyaanJawabanMatkulService($this->pertanyaanRepository);
        $this->viewPertanyaanJawabanService             = new ViewPertanyaanJawabanByPertanyaanIdService($this->pertanyaanRepository);
        $this->viewAllDosenService                      = new ViewAllDosenService($this->ipdRepository);
        $this->viewAllMataKuliahService                 = new ViewAllMataKuliahService($this->ipdRepository);
        $this->updatePertanyaanJawabanKuisionerService  = new UpdatePertanyaanJawabanKuisionerService($this->pertanyaanRepository, $this->jawabanRepository);
        $this->deletePertanyaanJawabanKuisionerService  = new DeletePertanyaanJawabanKuisionerService($this->pertanyaanRepository);
    }

    public function createDosenAction(){
        $this->view->pick('admin/dosen/create');
        return;
    }

    public function storeDosenAction(){
        $isi        = $this->request->getPost('pertanyaan');
        $isiInggris = $this->request->getPost('question');

        $jawaban_collection         = $this->request->getPost('jawaban');
        $jawabanInggris_collection  = $this->request->getPost('answer');
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
            $this->flashSession->success('Sukses menambahkan soal!');
            $this->response->redirect(['for'=>'ipd-admin-dosen-list']);
            $this->view->disable();
            return;
        }catch(Exception $e){
            $this->flashSession->error("Gagal menambahkan soal!");
        }
    }

    public function allDosenAction(){
        $respond                = $this->viewAllDosenService->execute();
        $this->view->respond    = $respond->dosen;
        $this->view->pick('admin/dosen/list');
    }

    public function listDosenAction(){
        $respond                = $this->viewAllPertanyaanJawabanDosenService->execute();
        $this->view->respond    = $respond->pertanyaan_with_jawaban;
        $this->view->pick('admin/dosen/index');
    }

    public function editDosenAction(){
        $request                = new ViewPertanyaanJawabanByPertanyaanIdRequest(new PertanyaanKuisionerId($this->dispatcher->getParam('id')));
        $respond                = $this->viewPertanyaanJawabanService->execute($request);
        // dd($respond->pertanyaan_with_jawaban);
        $this->view->pertanyaan = $respond->pertanyaan_with_jawaban;
        $this->view->pick('admin/dosen/edit');

    }

    public function updateDosenAction(){
        $pertanyaanId               = $this->request->getPost('pertanyaanId');
        $isiPertanyaan              = $this->request->getPost('pertanyaan');
        $isiInggrisPertanyaan       = $this->request->getPost('question');

        $jawabanId_collection       = $this->request->getPost('jawabanId');
        $jawaban_collection         = $this->request->getPost('jawaban');
        $jawabanInggris_collection  = $this->request->getPost('answer');
        $bobot_collection           = $this->request->getPost('bobot');

        $request    = new UpdatePertanyaanJawabanKuisionerRequest($pertanyaanId, 
                                $isiPertanyaan, 
                                $isiInggrisPertanyaan, 
                                $jawabanId_collection, 
                                $jawaban_collection, 
                                $jawabanInggris_collection, 
                                $bobot_collection 
                            );
        
        $respond    = $this->updatePertanyaanJawabanKuisionerService->execute($request);

        if($respond==True){
            $this->flashSession->success('Sukses mengubah soal!');
            $this->response->redirect(['for'=>'ipd-admin-dosen-list']);
            $this->view->disable();
        }else{
            $this->flashSession->error('Sukses mengubah soal!');
            $this->response->redirect(['for'=>'ipd-admin-dosen-list']);
            $this->view->disable();
        }
    }

    public function deleteDosenAction(){
        $id         = $this->request->getPost('ids');
        $request    = new DeletePertanyaanJawabanKuisionerRequest($id);
        $respond    = $this->deletePertanyaanJawabanKuisionerService->execute($request);

        if($respond==True){
            $this->flashSession->success('Sukses menghapus soal!');
            $this->response->redirect(['for'=>'ipd-admin-dosen-list']);
            $this->view->disable();
        }else{
            $this->flashSession->error('Sukses menghapus soal!');
            $this->response->redirect(['for'=>'ipd-admin-dosen-list']);
            $this->view->disable();
        }
    }
    
    public function allMataKuliahAction(){
        $respond                = $this->viewAllMataKuliahService->execute();
        $this->view->respond    = $respond->mataKuliah;
        $this->view->pick('admin/matkul/list');
    }

    public function createMatkulAction(){
        $this->view->pick('admin/matkul/create');
        return;
    }

    public function storeMatkulAction(){
        $isi        = $this->request->getPost('pertanyaan');
        $isiInggris = $this->request->getPost('question');

        $jawaban_collection         = $this->request->getPost('jawaban');
        $jawabanInggris_collection  = $this->request->getPost('answer');
        $bobot_collection           = $this->request->getPost('bobot');

        $request = new CreatePertanyaanKuisionerRequest($isi, $isiInggris, 2);
        
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
            $this->flashSession->success('Sukses menambahkan soal!');
            $this->response->redirect(['for'=>'ipd-admin-matkul-list']);
            $this->view->disable();
            return;
        }catch(Exception $e){
            $this->flashSession->error("Gagal menambahkan soal!");
        }
    }

    public function listMatkulAction(){
        $respond                = $this->viewAllPertanyaanJawabanMatkulService->execute();
        $this->view->respond    = $respond->pertanyaan_with_jawaban;
        $this->view->pick('admin/matkul/index');
    }

    public function editMatkulAction(){
        $request                = new ViewPertanyaanJawabanByPertanyaanIdRequest(new PertanyaanKuisionerId($this->dispatcher->getParam('id')));
        $respond                = $this->viewPertanyaanJawabanService->execute($request);
        // dd($respond->pertanyaan_with_jawaban);
        $this->view->pertanyaan = $respond->pertanyaan_with_jawaban;
        $this->view->pick('admin/matkul/edit');

    }

    public function updateMatkulAction(){
        $pertanyaanId               = $this->request->getPost('pertanyaanId');
        $isiPertanyaan              = $this->request->getPost('pertanyaan');
        $isiInggrisPertanyaan       = $this->request->getPost('question');

        $jawabanId_collection       = $this->request->getPost('jawabanId');
        $jawaban_collection         = $this->request->getPost('jawaban');
        $jawabanInggris_collection  = $this->request->getPost('answer');
        $bobot_collection           = $this->request->getPost('bobot');

        $request    = new UpdatePertanyaanJawabanKuisionerRequest($pertanyaanId, 
                                $isiPertanyaan, 
                                $isiInggrisPertanyaan, 
                                $jawabanId_collection, 
                                $jawaban_collection, 
                                $jawabanInggris_collection, 
                                $bobot_collection 
                            );
        
        $respond    = $this->updatePertanyaanJawabanKuisionerService->execute($request);

        if($respond==True){
            $this->flashSession->success('Sukses mengubah soal!');
            $this->response->redirect(['for'=>'ipd-admin-matkul-list']);
            $this->view->disable();
        }else{
            $this->flashSession->error('Sukses mengubah soal!');
            $this->response->redirect(['for'=>'ipd-admin-matkul-list']);
            $this->view->disable();
        }
    }

    public function deleteMatkulAction(){
        $id         = $this->request->getPost('ids');
        $request    = new DeletePertanyaanJawabanKuisionerRequest($id);
        $respond    = $this->deletePertanyaanJawabanKuisionerService->execute($request);

        if($respond==True){
            $this->flashSession->success('Sukses menghapus soal!');
            $this->response->redirect(['for'=>'ipd-admin-matkul-list']);
            $this->view->disable();
        }else{
            $this->flashSession->error('Sukses menghapus soal!');
            $this->response->redirect(['for'=>'ipd-admin-matkul-list']);
            $this->view->disable();
        }
    }
}