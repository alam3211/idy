<?php

namespace Idy\Idea\Application;


use Idy\Idea\Application\ViewAllIdeasResponse;
use Idy\Idea\Domain\Model\IdeaRepository;

class ViewAllIdeasService{

    private $repository;

    public function __construct(IdeaRepository $repository){
        $this->repository = $repository;
    }

    public function execute(){
        try{
            $ideas = $this->repository->allIdeas();
            return new ViewAllIdeasResponse($ideas,null);
        }catch(Execption $e){
            return new ViewAllIdeasResponse(null, $e);
        }
    }
}