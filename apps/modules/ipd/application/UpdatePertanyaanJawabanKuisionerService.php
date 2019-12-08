<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\JawabanKuisioner;
use Idy\Ipd\Domain\Model\PertanyaanRepository;

use Idy\Ipd\Domain\Model\JawabanRepository;
use Idy\Ipd\Domain\Model\PertanyaanKuisioner;

class UpdatePertanyaanJawabanKuisionerService
{
    private $pertanyaanRepository;
    private $jawabanRepository;

    public function __construct(PertanyaanRepository $pertanyaanRepository, JawabanRepository $jawabanRepository)
    {
        $this->pertanyaanRepository          = $pertanyaanRepository;
        $this->jawabanRepository             = $jawabanRepository;
        $this->createJawabanKuisionerService = new CreateJawabanKuisionerService($jawabanRepository);
    }

    public function execute(UpdatePertanyaanJawabanKuisionerRequest $request)
    {
        try {
            $jawabans_of_pertanyaan = $this->jawabanRepository->GetIdsbyPertanyaan($request->pertanyaanId);
            $jawabanTerhapus        = array_diff($jawabans_of_pertanyaan, $request->jawabanId_collection);

            $update_res = $this->pertanyaanRepository->update($request->pertanyaanId , $request->isi, $request->isiInggris);
            
            if(count($jawabanTerhapus)>0){
                $this->jawabanRepository->destroy($jawabanTerhapus);
            }
            $pertanyaanKuisioner = PertanyaanKuisioner::makePertanyaanKuisioner($request->isi, $request->isiInggris, null, null, $request->pertanyaanId->id());

            foreach($request->jawabanId_collection as $key => $jawabanId){
                if($jawabanId=='new'){
                    //create
                    $jawabanRequest = new CreateJawabanKuisionerRequest($request->jawaban_collection[$key], $request->jawabanInggris_collection[$key], $request->bobot_collection[$key], $pertanyaanKuisioner);

                    $jawabanRespond = $this->createJawabanKuisionerService->execute($jawabanRequest);
                }else{
                    //update
                    $jawabanKuisioner = JawabanKuisioner::makeJawabanKuisioner($request->jawaban_collection[$key], $request->jawabanInggris_collection[$key], $request->bobot_collection[$key], $jawabanId);
                    $this->jawabanRepository->update($jawabanKuisioner);
                }
            }

            $response = True;
            return $response;
        } catch (Execption $e) {
            return new PertanyaanKuisionerRespond(null, $e);
        }
    }

}