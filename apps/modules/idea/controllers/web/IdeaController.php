<?php

namespace Idy\Idea\Controllers\Web;

use Phalcon\Mvc\Controller;
use Idy\Idea\Application\ViewAllIdeasService;

use Idy\Idea\Application\CreateNewIdeaService;
use Idy\Idea\Application\CreateNewIdeaRequest;

use Idy\Idea\Application\VoteIdeaService;
use Idy\Idea\Application\VoteIdeaRequest;

class IdeaController extends Controller
{
    private $ideaRepository;
    private $allIdeaService;
    private $createIdeaService;
    private $voteIdeaService;

    public function initialize(){
        $this->ideaRepository = $this->di->getShared('sql_idea_repository');    
        $this->allIdeasService = new ViewAllIdeasService($this->ideaRepository);
        $this->createIdeaService = new CreateNewIdeaService($this->ideaRepository);
        $this->voteIdeaService = new VoteIdeaService($this->ideaRepository);
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

    public function addPostAction(){
        $ideaTitle          = $this->request->getPost('ideaTitle');
        $ideaDescription    = $this->request->getPost('ideaDescription');
        $authorName         = $this->request->getPost('authorName');
        $authorEmail        = $this->request->getPost('authorEmail');
        $request = new CreateNewIdeaRequest(
            $ideaTitle, $ideaDescription, $authorName, $authorEmail
    );
        $this->createIdeaService->execute($request);
        $this->response->redirect('/');
        $this->view->disable();
        return;
    }

    public function voteAction()
    {
        $ideaId = $this->dispatcher->getParam('id');
        $request = new VoteIdeaRequest($ideaId);

        $this->voteIdeaService->execute($request);
        $this->response->redirect('/');
        $this->view->disable();
        return;
    }

    public function rateAction()
    {
        
    }

}