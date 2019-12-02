<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \Idy\Ipd\Domain\Model\PertanyaanKuisioner;

class PertanyaanKuisionerTest extends TestCase
{

    /** @test */
    public function makePertanyaanKuisionerModel() : void
    {
        $pertanyaanKuisioner = PertanyaanKuisioner::makePertanyaanKuisioner("Siapa aku ?", "Who am i ?");

        $this->assertEquals('Siapa aku ?', $pertanyaanKuisioner->isi());
        $this->assertEquals('Who am i ?', $pertanyaanKuisioner->isiInggris());

    }
    
}