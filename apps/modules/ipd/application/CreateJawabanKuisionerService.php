<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\KuisionerRepository;
use Idy\Ipd\Domain\Model\JawabanKuisinoner;

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
            $jawabanKuisioner = JawabanKuisinoner::makeJawabanKuisioner(
                $request->isi, 
                $request->isiInggris,
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