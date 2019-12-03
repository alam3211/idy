<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\KuisionerRepository;
use Idy\Ipd\Domain\Model\PertanyaanKuisioner;

use Idy\Ipd\Application\UpdatePertanyaanKuisionerRequest;

class UpdatePertanyaanKuisionerService
{
    private $kuisionerRepository;

    public function __construct(KuisionerRepository $kuisionerRepository)
    {
        $this->kuisionerRepository = $kuisionerRepository;
    }

    public function execute(UpdatePertanyaanKuisionerRequest $request)
    {
        try {
            $update = $this->kuisionerRepository->update($request->pertanyaanId , $request->isi, $request->isiInggris);
            $response = new PertanyaanKuisionerRespond($update, null);
            return $response;
        } catch (Execption $e) {
            return new PertanyaanKuisionerRespond(null, $e);
        }
    }

}