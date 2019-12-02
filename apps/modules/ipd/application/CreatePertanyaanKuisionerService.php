<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\KuisionerRepository;
use Idy\Ipd\Domain\Model\PertanyaanKuisioner;

use Idy\Ipd\Application\CreatePertanyaanKuisionerRequest;

class CreatePertanyaanKuisionerService
{
    private $kuisionerRepository;

    public function __construct(KuisionerRepository $kuisionerRepository)
    {
        $this->kuisionerRepository = $kuisionerRepository;
    }

    public function execute(CreatePertanyaanKuisionerRequest $request)
    {
        try {
            $pertanyaanKuisioner = PertanyaanKuisioner::makePertanyaanKuisioner(
                $request->isi, 
                $request->isiInggris
            );
            $this->kuisionerRepository->save($pertanyaanKuisioner);
            $response = new CreatePertanyaanKuisionerRespond($pertanyaanKuisioner, null);
            return $response;
        } catch (Execption $e) {
            return new CreatePertanyaanKuisionerRespond(null, $e);
        }
    }

}