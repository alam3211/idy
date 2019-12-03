<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\JawabanRepository;
use Idy\Ipd\Domain\Model\JawabanKuisioner;

use Idy\Ipd\Application\CreateJawabanKuisionerRequest;

class CreateJawabanKuisionerService
{
    private $jawabanRepository;

    public function __construct(JawabanRepository $jawabanRepository)
    {
        $this->jawabanRepository = $jawabanRepository;
    }

    public function execute(CreateJawabanKuisionerRequest $request)
    {
        try {
            $jawabanKuisioner = JawabanKuisioner::makeJawabanKuisioner(
                $request->jawaban, 
                $request->jawabanInggris,
                $request->bobot,
            );
            $this->jawabanRepository->save($jawabanKuisioner,$request->pertanyaanKuisioner);
            $response = new CreateJawabanKuisionerRespond($jawabanKuisioner, null);
            return $response;
        } catch (Execption $e) {
            return new CreateJawabanKuisionerRespond(null, $e);
        }
    }

}