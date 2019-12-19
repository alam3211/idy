<?php

namespace Idy\Ipd\Controllers\Web;

use Idy\Ipd\Application\CreateJawabanKuisionerRequest;
use Idy\Ipd\Application\CreateJawabanKuisionerService;
use Idy\Ipd\Application\CreatePertanyaanKuisionerService;
use Idy\Ipd\Application\CreatePertanyaanKuisionerRequest;
use Idy\Ipd\Application\SubmitKuisionerKelasRequest;
use Idy\Ipd\Application\SubmitKuisionerKelasService;
use Idy\Ipd\Application\ViewAllPertanyaanJawabanDosenService;
use Idy\Ipd\Application\ViewAllPertanyaanJawabanMatkulService;
use Idy\Ipd\Application\ViewFormKuisonerDosenRequest;
use Idy\Ipd\Application\ViewFormKuisonerDosenService;
use Idy\Ipd\Application\ViewFormKuisonerKelasRequest;
use Idy\Ipd\Application\ViewFormKuisonerKelasService;
use Idy\Ipd\Application\ViewKuisonerDosenByMahasiswaRequest;
use Idy\Ipd\Application\ViewKuisonerDosenByMahasiswaService;
use Idy\Ipd\Application\ViewKuisonerKelasByMahasiswaRequest;
use Idy\Ipd\Application\ViewKuisonerKelasByMahasiswaService;
use Idy\Ipd\Application\ViewPertanyaanJawabanByPertanyaanIdService;
use Idy\Ipd\Application\ViewPertanyaanJawabanByPertanyaanIdRequest;
use Phalcon\Mvc\Controller;

class MahasiswaController extends Controller
{
    private $kuisonerRepository;
    private $pertanyaanRepository;
    private $kelasRepository;
    private $viewKuisonerKelasByMahasiswa;
    private $viewAllPertanyaanJawabanMatkul;
    private $viewFormKuisonerKelas;
    private $viewFormKuisonerDosen;
    private $submitKuisonerKelas;
    
    public function initialize(){
        $this->pertanyaanRepository = $this->di->getShared('sql_pertanyaan_repository');
        $this->kuisonerRepository = $this->di->getShared('sql_kuisoner_repository');
        $this->kelasRepository = $this->di->getShared('sql_kelas_repository');
        $this->viewKuisonerKelasByMahasiswa = new ViewKuisonerKelasByMahasiswaService($this->kuisonerRepository);
        $this->viewKuisonerDosenByMahasiswa = new ViewKuisonerDosenByMahasiswaService($this->kuisonerRepository);
        $this->viewAllPertanyaanJawabanMatkul = new ViewAllPertanyaanJawabanDosenService($this->pertanyaanRepository);
        $this->viewFormKuisonerKelas = new ViewFormKuisonerKelasService($this->pertanyaanRepository,$this->kelasRepository);
        $this->viewFormKuisonerDosen = new ViewFormKuisonerDosenService($this->pertanyaanRepository,$this->kelasRepository);
        $this->submitKuisonerKelas = new SubmitKuisionerKelasService($this->kuisonerRepository);
    }

    public function daftarKuisonerKelasAction(){
        $request = new ViewKuisonerKelasByMahasiswaRequest('1','05111640000089','Vincent');
        $hasil = $this->viewKuisonerKelasByMahasiswa->execute($request);
        $this->view->respond    = $hasil->daftarKuisonerKelas();
        $this->view->pick('mahasiswa/kuisoner-kelas');
    }

    public function daftarKuisonerDosenAction(){
        $request = new ViewKuisonerDosenByMahasiswaRequest('1','05111640000089','Vincent');
        $hasil = $this->viewKuisonerDosenByMahasiswa->execute($request);
        $this->view->respond    = $hasil->daftarKuisonerDosen();
        $this->view->pick('mahasiswa/kuisoner-dosen');
    }

    public function isiKuisonerKelasAction(){
        $request = new ViewFormKuisonerKelasRequest($this->dispatcher->getParam('id'));
        $hasil = $this->viewFormKuisonerKelas->execute($request);
        $this->view->pertanyaan    = $hasil->daftarPertanyaan();
        // dd($hasil->detailKelas()[0]['kelas_id']); 
        $this->view->detail    = $hasil->detailKelas();
        $this->view->index    = 1;
        $this->view->pick('mahasiswa/isi-kuisoner-kelas');
    }

    public function isiKuisonerDosenAction(){
        $request = new ViewFormKuisonerDosenRequest($this->dispatcher->getParam('id'));
        $hasil = $this->viewFormKuisonerDosen->execute($request);
        $this->view->pertanyaan    = $hasil->daftarPertanyaan();
        // dd($hasil->detailKelas()[0]['kelas_id']); 
        $this->view->detail    = $hasil->detailKelas();
        $this->view->index    = 1;
        $this->view->pick('mahasiswa/isi-kuisoner-dosen');
    }

    public function submitKuisonerKelasAction(){
        $idKelas = $this->request->getPost('kelas');
        $pertanyaan = $this->request->getPost('pertanyaan');
        $jawaban = $this->request->getPost('jawaban');

        $bobot = [];
        $jawaban = [];
        foreach ($this->request->getPost('jawaban') as $index => $item) {
            $string = explode("|",$item);
            $jawaban[] = $string[0];
            $bobot[] = $string[1];
        }


        $catatan = $this->request->getPost('catatan');
        $request = new SubmitKuisionerKelasRequest($idKelas,1,$pertanyaan,$jawaban,$bobot,$catatan,2);
        $hasil = $this->submitKuisonerKelas->execute($request);
        if($hasil){
            $this->flashSession->success('Sukses menjawab kuisioner!');
        }else{
            $this->flashSession->error('Gagal menjawab kuisioner!');
        }
        $this->response->redirect(['for'=>'ipd-mahasiswa-kuisoner-mata-kuliah']);
        $this->view->disable();
    }

    public function submitKuisonerDosenAction(){
        // dd($this->request->getPost());
        $idKelas = $this->request->getPost('kelas');
        $pertanyaan = $this->request->getPost('pertanyaan');
        $jawaban = $this->request->getPost('jawaban');

        $bobot = [];
        $jawaban = [];
        foreach ($this->request->getPost('jawaban') as $index => $item) {
            $string = explode("|",$item);
            $jawaban[] = $string[0];
            $bobot[] = $string[1];
        }


        $catatan = $this->request->getPost('catatan');
        $request = new SubmitKuisionerKelasRequest($idKelas,1,$pertanyaan,$jawaban,$bobot,$catatan,1);
        $hasil = $this->submitKuisonerKelas->execute($request);
        if($hasil){
            $this->flashSession->success('Sukses menjawab kuisioner!');
        }else{
            $this->flashSession->error('Gagal menjawab kuisioner!');
        }
        $this->response->redirect(['for'=>'ipd-mahasiswa-kuisoner-dosen']);
        $this->view->disable();
    }
}