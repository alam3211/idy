<?php

namespace Idy\Idea\Application;

class VoteIdeaResponse
{
    public $ideas;
    public $errors;

    public function __construct( $ideas = null , $errors = null){
        $this->ideas = $ideas;
        $this->errors = $errors;
    }

    public function ideas(){
        return $this->ideas;
    }

    public function errors(){
        return $this->errors;
    }

}