<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\JawabanRepository;
use Idy\Ipd\Application\DeleteJawabanKuisionerRequest;

class DeleteJawabanKuisionerService
{
    private $jawabanRepository;
    public function __construct(JawabanRepository $jawabanRepository)
    {
        $this->jawabanRepository = $jawabanRepository;
    }

    public function execute(DeleteJawabanKuisionerRequest $request)
    {
        try{
            $response = $this->jawabanRepository->destroy($request->array_of_id);
            return new JawabanKuisionerRespond($response, null);
        } catch (Exception $e) {
            return new JawabanKuisionerRespond(null, $e);
        }
    }

}