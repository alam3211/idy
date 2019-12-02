<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\KuisionerRepository;
use Idy\Ipd\Domain\Model\PertanyaanKuisioner;
use Idy\Ipd\Application\CreatePertanyaanKuisionerRequest;

class CreatePertanyaanKuisionerService
{
    private $ideaRepository;

    public function __construct(IdeaRepository $ideaRepository)
    {
        $this->ideaRepository = $ideaRepository;
    }

    public function execute(CreateNewIdeaRequest $request)
    {
        try {
            $idea = Idea::makeIdea(
                $request->ideaTitle, 
                $request->ideaDescription, 
                $request->authorName, 
                $request->authorEmail);
            $this->ideaRepository->save($idea);
            $response = new CreateNewIdeaResponse($idea, null);
            return $response;
        } catch (Execption $e) {
            return new CreateNewIdeasResponse(null, $e);
        }
    }

}