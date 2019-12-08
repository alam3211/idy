<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\PertanyaanRepository;

use Idy\Ipd\Application\DeletePertanyaanKuisionerRequest;

class DeletePertanyaanKuisionerService
{
    private $pertanyaanRepository;

    public function __construct(PertanyaanRepository $pertanyaanRepository)
    {
        $this->pertanyaanRepository = $pertanyaanRepository;
    }

    public function execute(DeletePertanyaanKuisionerRequest $request)
    {
        try {
            $Delete = $this->pertanyaanRepository->destroy($request->array_of_id);
            $response = new PertanyaanKuisionerRespond($Delete, null);
            return $response;
        } catch (Execption $e) {
            return new PertanyaanKuisionerRespond(null, $e);
        }
    }

}