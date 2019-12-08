<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\PertanyaanRepository;

use Idy\Ipd\Application\UpdatePertanyaanKuisionerRequest;

class UpdatePertanyaanKuisionerService
{
    private $pertanyaanRepository;

    public function __construct(PertanyaanRepository $pertanyaanRepository)
    {
        $this->pertanyaanRepository = $pertanyaanRepository;
    }

    public function execute(UpdatePertanyaanKuisionerRequest $request)
    {
        try {
            $update = $this->pertanyaanRepository->update($request->pertanyaanId , $request->isi, $request->isiInggris);
            $response = new PertanyaanKuisionerRespond($update, null);
            return $response;
        } catch (Execption $e) {
            return new PertanyaanKuisionerRespond(null, $e);
        }
    }

}