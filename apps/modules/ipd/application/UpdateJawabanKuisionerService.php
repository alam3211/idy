<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\JawabanRepository;
use Idy\Ipd\Domain\Model\JawabanKuisioner;

use Idy\Ipd\Application\UpdateJawabanKuisionerRequest;
use Idy\Ipd\Domain\Model\JawabanKuisionerId;

class UpdateJawabanKuisionerService
{
    private $jawabanRepository;
    private $createJawabanKuisionerService;
    public function __construct(JawabanRepository $jawabanRepository)
    {
        $this->jawabanRepository = $jawabanRepository;
        $this->createJawabanKuisionerService = new CreateJawabanKuisionerService($jawabanRepository);
    }

    public function execute(UpdateJawabanKuisionerRequest $request)
    {
        try{
            $jawabanKuisioner = JawabanKuisioner::makeJawabanKuisioner($request->jawaban, $request->jawabanInggris , $request->bobot , $request->id);
            if(is_null($request->id)){
                $new_jawaban = new CreateJawabanKuisionerRequest($request->jawaban, $request->jawabanInggris, $request->bobot, $request->pertanyaanKuisioner);
                $response = $this->createJawabanKuisionerService->execute($new_jawaban);                
            }else{
                $response = $this->jawabanRepository->update($jawabanKuisioner);
            }
            return new JawabanKuisionerRespond($response, null);
        } catch (Exception $e) {
            return new JawabanKuisionerRespond(null, $e);
        }
    }

}