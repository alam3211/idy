<?php

namespace Idy\Idea\Domain\Model;

use Idy\idea\Domain\Model\Idea;
use Idy\idea\Domain\Model\IdeaId;

interface IdeaRepository
{
    public function byId(IdeaId $id);

    public function save(Idea $idea);

    public function exist(IdeaId $id) : bool;
    
    public function allIdeas();
}