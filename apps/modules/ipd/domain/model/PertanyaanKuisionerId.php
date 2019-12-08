<?php
namespace Idy\Ipd\Domain\Model;

use Ramsey\Uuid\Uuid;

class PertanyaanKuisionerId
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
    public function equals(PertanyaanKuisionerId $pertanyaanKuisionerId)
    {
        return $this->id === $pertanyaanKuisionerId->id;
    }
}