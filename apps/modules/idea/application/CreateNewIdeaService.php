<?php

namespace Idy\Idea\Application;

use Idy\Idea\Domain\Model\IdeaRepository;
use Idy\Idea\Domain\Model\Idea;
use Idy\Idea\Application\CreateNewIdeaRequest;

class CreateNewIdeaService
{
    private $ideaRepository;

    public function __construct(IdeaRepository $ideaRepository)
    {
        $this->ideaRepository = $ideaRepository;
    }

    public function execute(CreateNewIdeaRequest $request)
    {
        try {
            $idea = Idea::makeIdea($request->ideaTitle, $request->ideaDescription, $request->authorName, $request->authorEmail);
            $this->ideaRepository->save($idea);
            $response = new CreateNewIdeaResponse($idea, null);
            return $response;
        } catch (Execption $e) {
            return new CreateNewIdeasResponse(null, $e);
        }
    }

}