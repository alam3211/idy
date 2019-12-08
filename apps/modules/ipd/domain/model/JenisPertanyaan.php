<?php
namespace Idy\Ipd\Domain\Model;

use Ramsey\Uuid\Uuid;

class JenisPertanyaan
{
    private $id;
    public function __construct($id = null)
    {
        $this->id = $id;
    }
    public function id() 
    {
        return $this->id;
    }
}