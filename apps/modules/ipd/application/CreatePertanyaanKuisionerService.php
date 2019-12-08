<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\PertanyaanRepository;
use Idy\Ipd\Domain\Model\PertanyaanKuisioner;

use Idy\Ipd\Application\CreatePertanyaanKuisionerRequest;

class CreatePertanyaanKuisionerService
{
    private $pertanyaanRepository;

    public function __construct(PertanyaanRepository $pertanyaanRepository)
    {
        $this->pertanyaanRepository = $pertanyaanRepository;
    }

    public function execute(CreatePertanyaanKuisionerRequest $request)
    {
        try {
            $pertanyaanKuisioner = PertanyaanKuisioner::makePertanyaanKuisioner(
                $request->isi, 
                $request->isiInggris,
                $request->jenis,
            );
            $this->pertanyaanRepository->save($pertanyaanKuisioner);
            $response = new PertanyaanKuisionerRespond($pertanyaanKuisioner, null);
            return $response;
        } catch (Execption $e) {
            return new PertanyaanKuisionerRespond(null, $e);
        }
    }

}