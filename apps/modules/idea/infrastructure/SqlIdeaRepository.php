<?php 

namespace Idy\Idea\Infrastructure;
use Phalcon\Di;

use Idy\Idea\Domain\Model\Idea;
use Idy\Idea\Domain\Model\IdeaId;
use Idy\Idea\Domain\Model\IdeaRepository;

class SqlIdeaRepository implements IdeaRepository
{
    private $db;

    public function __construct($db)
    {        
        $this->db = $db;
    }

    public function byId(IdeaId $id)
    {

    }

    public function save(Idea $idea)
    {

    }

    public function allIdeas()
    {
        $querytSet = $this->db->query(
            "SELECT * FROM idea "
        );
        $resultSet = $querytSet->fetchAll();
        return $resultSet;
    }
    
}