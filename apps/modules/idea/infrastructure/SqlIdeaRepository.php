<?php 

namespace Idy\Idea\Infrastructure;
use Phalcon\Di;

use Idy\Idea\Domain\Model\Idea;
use Idy\Idea\Domain\Model\IdeaId;
use Idy\Idea\Domain\Model\IdeaRepository;

class SqlIdeaRepository implements IdeaRepository
{
    private $db;
    private $dbTable;
    public function __construct($db)
    {        
        $this->db = $db;
        $this->dbTable = "idea";
    }

    public function byId(IdeaId $id)
    {

    }

    public function save(Idea $idea)
    {
        $isExist    = $this->exist($idea->id());
        if ($isExist) {
            $querySet   = $this->db->updateAsDict(
                $this->dbTable,
                [
                    "title"         => $idea->title(),
                    "description"   => $idea->description(),
                    "author"        => $idea->author(),
                    "email"         => $idea->email(),
                    "vote"          => $idea->votes(),
                ],
                "id = {$idea->id()}"
            );    
        }else{
            $querySet   = $this->db->execute(
                "INSERT INTO $this->dbTable (id,title,description,author,email,vote) VALUES (?,?,?,?,?,?)",
                [
                    $idea->id()->id(),
                    $idea->title(),
                    $idea->description(),
                    $idea->author(),
                    $idea->email(),
                    $idea->votes(),
                ]
            );
        }
        $resultSet = $querySet;
        return $resultSet;
    }

    public function allIdeas()
    {
        $querySet = $this->db->query(
            "SELECT * FROM $this->dbTable "
        );
        $resultSet = $querySet->fetchAll();
        return $resultSet;
    }
    
    public function exist(IdeaId $id) : bool {
        $querySet = $this->db->query(
            "SELECT * FROM $this->dbTable WHERE id = ?",
            [
                "{$id->id()}",
            ]
        );
        $resultSet = $querySet->fetch();
        return !($resultSet == false);
    }
}