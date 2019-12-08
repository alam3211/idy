<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\PertanyaanRepository;

use Idy\Ipd\Application\DeletePertanyaanJawabanKuisionerRequest;

class DeletePertanyaanJawabanKuisionerService
{
    private $pertanyaanRepository;
    private $jawabanRepository;

    public function __construct(PertanyaanRepository $pertanyaanRepository)
    {
        $this->pertanyaanRepository = $pertanyaanRepository;
    }

    public function execute(DeletePertanyaanJawabanKuisionerRequest $request)
    {
        try {
            $delete = $this->pertanyaanRepository->destroyWithJawaban($request->array_of_id);
            return $delete;
        } catch (Execption $e) {
            return new PertanyaanKuisionerRespond(null, $e);
        }
    }

}