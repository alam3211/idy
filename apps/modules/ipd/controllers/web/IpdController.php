<?php

namespace Idy\Ipd\Controllers\Web;

use Phalcon\Mvc\Controller;

class IpdController extends Controller
{

    public function initialize(){
    }

    public function indexAction()
    {
        $this->view->pick('home');
        return;
    }

}