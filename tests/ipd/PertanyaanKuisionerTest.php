<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \Idy\Ipd\Domain\Model\PertanyaanKuisioner;

use \Idy\Ipd\Application\CreatePertanyaanKuisionerService;
use \Idy\Ipd\Application\CreatePertanyaanKuisionerRequest;


class PertanyaanKuisionerTest extends TestCase
{

    public function makePertanyaanKuisionerModel() : void
    {
        $pertanyaanKuisioner = PertanyaanKuisioner::makePertanyaanKuisioner("Siapa aku ?", "Who am i ?");

        $this->assertEquals('Siapa aku ?', $pertanyaanKuisioner->isi());
        $this->assertEquals('Who am i ?', $pertanyaanKuisioner->isiInggris());
    }
    
}