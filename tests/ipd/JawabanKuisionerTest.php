<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \Idy\Ipd\Domain\Model\PertanyaanKuisioner;
use \Idy\Ipd\Domain\Model\JawabanKuisioner;


class JawabanKuisionerTest extends TestCase
{

    /** @test */
    public function makeJawabanKuisionerModel() : void
    {
        $pertanyaanKuisioner = PertanyaanKuisioner::makePertanyaanKuisioner("Siapa aku ?", "Who am i ?");

        $jawaban        = array('Sangat Tidak Setuju', 'Tidak Setuju', 'Setuju', 'Sangat Setuju');
        $jawabanInggris = array('Strongly disagree', 'disagree', 'agree', 'Absolutely agree');
        $bobot          = array(1,2,3,4);

        foreach ($jawaban as $key => $val) {
            $jawabanKuisioner[] = JawabanKuisioner::makeJawabanKuisioner($val, $jawabanInggris[$key], $bobot[$key], $pertanyaanKuisioner);
        }

        foreach ($jawaban as $key => $val) {
            $this->assertEquals($val,$jawabanKuisioner[$key]->jawaban());
            $this->assertEquals($jawabanInggris[$key],$jawabanKuisioner[$key]->jawabanInggris());
            $this->assertEquals($bobot[$key],$jawabanKuisioner[$key]->bobot());
        }

        $this->assertEquals($jawabanKuisioner[0]->pertanyaan()->isi(), $jawabanKuisioner[1]->pertanyaan()->isi());
        $this->assertEquals($jawabanKuisioner[1]->pertanyaan()->isi(), $jawabanKuisioner[2]->pertanyaan()->isi());
        $this->assertEquals($jawabanKuisioner[2]->pertanyaan()->isi(), $jawabanKuisioner[3]->pertanyaan()->isi());
        $this->assertEquals($jawabanKuisioner[3]->pertanyaan()->isi(), $jawabanKuisioner[0]->pertanyaan()->isi());


    }
    
}