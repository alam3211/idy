<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;

use \Idy\Ipd\Domain\Model\StatistikKuisioner;
use \Idy\Ipd\Domain\Model\Dosen;
use \Idy\Ipd\Domain\Model\Kelas;


class StatistikKuisionerTest extends TestCase
{

    /** @test */
    public function makeStatistikKuisionerModel() : void
    {
        $rataan = 4.0;
        $jumlahPopulasi = 40;
        $jumlahResponden = 35;

        $statistikKuisioner = StatistikKuisioner::makeStatistikKuisioner($rataan, $jumlahPopulasi, $jumlahResponden);

        $this->assertEquals($rataan, $statistikKuisioner->rataan());
        $this->assertEquals($jumlahPopulasi, $statistikKuisioner->jumlahPopulasi());
        $this->assertEquals($jumlahResponden, $statistikKuisioner->jumlahResponden());
    }
}