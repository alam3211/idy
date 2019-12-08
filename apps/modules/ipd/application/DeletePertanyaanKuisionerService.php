<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\KuisionerRepository;
use Idy\Ipd\Domain\Model\PertanyaanKuisioner;

use Idy\Ipd\Application\DeletePertanyaanKuisionerRequest;

class DeletePertanyaanKuisionerService
{
    private $kuisionerRepository;

    public function __construct(KuisionerRepository $kuisionerRepository)
    {
        $this->kuisionerRepository = $kuisionerRepository;
    }

    public function execute(DeletePertanyaanKuisionerRequest $request)
    {
        try {
            $Delete = $this->kuisionerRepository->destroy($request->array_of_id);
            $response = new PertanyaanKuisionerRespond($Delete, null);
            return $response;
        } catch (Execption $e) {
            return new PertanyaanKuisionerRespond(null, $e);
        }
    }

}