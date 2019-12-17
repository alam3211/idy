<?php

namespace Idy\Ipd\Controllers\Web;

use Idy\Ipd\Application\ViewAllPertanyaanJawabanDosenService;
use Idy\Ipd\Application\ViewAllPertanyaanJawabanMatkulService;
use Idy\Ipd\Application\ViewPertanyaanJawabanByPertanyaanIdService;
use Idy\Ipd\Application\ViewPertanyaanJawabanByPertanyaanIdRequest;
use Idy\Ipd\Application\ViewKelasbyDosenService;
use Idy\Ipd\Application\ViewIpdKuisionerbyKelasService;
use Idy\Ipd\Application\ViewIpdKuisionerbyKelasRequest;
use Idy\Ipd\Application\ViewCatatanKuisionerbyKelasService;
use Idy\Ipd\Application\ViewCatatanKuisionerbyKelasRequest;
use Phalcon\Mvc\Controller;



class DosenController extends Controller
{
    private $pertanyaanRepository;
    private $jawabanRepository;
    private $ipdRepository;
    private $kelasRepository;
    private $kuisonerRepository;

    public function initialize(){
        $this->pertanyaanRepository                     = $this->di->getShared('sql_pertanyaan_repository');
        $this->jawabanRepository                        = $this->di->getShared('sql_jawaban_repository');
        $this->ipdRepository                            = $this->di->getShared('sql_ipd_repository');
        $this->kelasRepository                          = $this->di->getShared('sql_kelas_repository');
        $this->kuisonerRepository                       = $this->di->getShared('sql_kuisoner_repository');
        $this->viewAllPertanyaanJawabanDosenService     = new ViewAllPertanyaanJawabanDosenService($this->pertanyaanRepository);
        $this->viewAllPertanyaanJawabanMatkulService    = new ViewAllPertanyaanJawabanMatkulService($this->pertanyaanRepository);
        $this->viewPertanyaanJawabanService             = new ViewPertanyaanJawabanByPertanyaanIdService($this->pertanyaanRepository);
        $this->viewCatatanKuisionerbyKelasService       = new ViewCatatanKuisionerbyKelasService($this->kuisonerRepository);
        $this->viewKelasbyDosenService                  = new ViewKelasbyDosenService($this->kelasRepository);
        $this->ViewIpdKuisionerbyKelasService           = new ViewIpdKuisionerbyKelasService($this->ipdRepository);

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

    public function getIpdAction()
    {
        if ($this->request->isAjax()) {
            $this->response->setJsonContent('True');
            $idKelas        = $this->request->getPost('id');
            $dayaTampung    = $this->request->getPost('daya_tampung');
            
            $requestIpd = new ViewIpdKuisionerbyKelasRequest($idKelas, $dayaTampung);
            $ipd = $this->ViewIpdKuisionerbyKelasService->execute($requestIpd);

            $requestCatatanKuisoner = new ViewCatatanKuisionerbyKelasRequest($idKelas);
            $catatanKuisoner = $this->viewCatatanKuisionerbyKelasService->execute($requestCatatanKuisoner);

            $response = [
                'code' => 200,
                'data' => [
                    'totalPeserta'      => $ipd->hasilIpd()->totalPeserta(),
                    'totalRespondenIpd'    => $ipd->hasilIpd()->totalRespondenIpd(),
                    'totalRespondenIpmk'    => $ipd->hasilIpd()->totalRespondenIpmk(),
                    'ipd'               => $ipd->hasilIpd()->ipd(),
                    'ipmk'              => $ipd->hasilIpd()->ipmk(),
                    'catatan'           => $catatanKuisoner->catatanKuisoner()
                ]
            ];

            $this->response->setJsonContent($response);

        }else $this->response->setJsonContent('This is not ajax call');
        return $this->response;
    }
}
