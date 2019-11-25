<?php

namespace Idy\Idea\Application;

use Idy\Idea\Domain\Model\IdeaRepository;
use Idy\Idea\Domain\Model\IdeaId;
use Idy\Idea\Domain\Model\Idea;
use Idy\Idea\Application\VoteIdeaRequest;

class VoteIdeaService
{
    private $ideaRepository;

    public function __construct(IdeaRepository $ideaRepository)
    {
        $this->ideaRepository = $ideaRepository;
    }

    public function execute(VoteIdeaRequest $request)
    {
        try {
            $ideaId = $request->ideaId;
            $ideaById = $this->ideaRepository->byId($ideaId);
            
            $idea = Idea::makeIdea(
                $ideaId->id(),
                $ideaById['title'],
                $ideaById['description'],
                $ideaById['author'],
                $ideaById['email'],
                $ideaById['vote']
            );
            $idea->vote();
            
            $this->ideaRepository->save($idea);
            $response = new VoteIdeaResponse($idea, null);
            return $response;
        } catch (Execption $e) {
            return new VoteIdeaResponse(null, $e);
        }
    }

}