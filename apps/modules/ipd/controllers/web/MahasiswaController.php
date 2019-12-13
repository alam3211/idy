<?php

namespace Idy\Ipd\Controllers\Web;

use Idy\Ipd\Application\CreateJawabanKuisionerRequest;
use Idy\Ipd\Application\CreateJawabanKuisionerService;
use Idy\Ipd\Application\CreatePertanyaanKuisionerService;
use Idy\Ipd\Application\CreatePertanyaanKuisionerRequest;
use Idy\Ipd\Application\ViewAllPertanyaanJawabanDosenService;
use Idy\Ipd\Application\ViewAllPertanyaanJawabanMatkulService;
use Idy\Ipd\Application\ViewFormKuisonerKelasRequest;
use Idy\Ipd\Application\ViewFormKuisonerKelasService;
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
    
    public function initialize(){
        $this->pertanyaanRepository = $this->di->getShared('sql_pertanyaan_repository');
        $this->kuisonerRepository = $this->di->getShared('sql_kuisoner_repository');
        $this->kelasRepository = $this->di->getShared('sql_kelas_repository');
        $this->viewKuisonerKelasByMahasiswa = new ViewKuisonerKelasByMahasiswaService($this->kuisonerRepository);
        $this->viewAllPertanyaanJawabanMatkul = new ViewAllPertanyaanJawabanDosenService($this->pertanyaanRepository);
        $this->viewFormKuisonerKelas = new ViewFormKuisonerKelasService($this->pertanyaanRepository,$this->kelasRepository);
    }

    public function daftarKuisonerKelasAction(){
        $request = new ViewKuisonerKelasByMahasiswaRequest('1','05111640000089','Vincent');
        $hasil = $this->viewKuisonerKelasByMahasiswa->execute($request);
        $this->view->respond    = $hasil->daftarKuisonerKelas();
        $this->view->pick('mahasiswa/kuisoner-kelas');
    }

    public function daftarKuisonerDosenAction(){
        $request = new ViewKuisonerKelasByMahasiswaRequest('1','05111640000089','Vincent');
        $hasil = $this->viewKuisonerKelasByMahasiswa->execute($request);
        $this->view->respond    = $hasil->daftarKuisonerKelas();
        $this->view->pick('mahasiswa/kuisoner-dosen');
    }

    public function isiKuisonerKelasAction(){
        $request = new ViewFormKuisonerKelasRequest('1');
        $hasil = $this->viewFormKuisonerKelas->execute($request);
        $this->view->pertanyaan    = $hasil->daftarPertanyaan();
        $this->view->detailKelas    = $hasil->detailKelas();
        $this->view->pick('mahasiswa/isi-kuisoner-kelas');
    }
}