<?php
namespace Idy\Ipd\Domain\Model;

use Ramsey\Uuid\Uuid;

class JawabanKuisionerId
{
    private $id;
    public function __construct($id = null)
    {
        $this->id = $id ? : Uuid::uuid4()->toString();
    }
    public function id() 
    {
        return $this->id;
    }
    public function equals(JawabanKuisionerId $jawabanKuisionerId)
    {
        return $this->id === $jawabanKuisionerId->id;
    }
}