<?php

namespace Idy\Idea\Controllers\Web;

use Phalcon\Mvc\Controller;
use Idy\Idea\Application\ViewAllIdeasService;

class IdeaController extends Controller
{
    private $ideaRepository;
    private $allIdeasService;

    public function initialize(){
        $this->ideaRepository = $this->di->getShared('sql_idea_repository');    
        $this->allIdeasService = new ViewAllIdeasService($this->ideaRepository);
    }

    public function indexAction()
    {
        $response = $this->allIdeasService->execute();
        
        $this->view->setVars([
            'ideas' =>  $response->ideas
        ]);
        $this->view->pick('home');
        return;
    }

    public function addAction()
    {
        return $this->view->pick('add');
    }

    public function voteAction()
    {

    }

    public function rateAction()
    {
        
    }

}