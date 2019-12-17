<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \Idy\Ipd\Domain\Model\CalculateIpd;

class CalculateIpdTest extends TestCase
{        
    /** @test */
    public function testCalculateIpd() : void
    {
        $kuisoner = array();
        $daya_tampung = 5;
        $daya_tampungFalse = 50;

        for ($i=0; $i < 10; $i++) {
            $kuisoner[$i]['respon_kuisioner'] = array();
                if ($i % 2 == 0) {
                    $kuisoner[$i]['jenis_kuisioner'] = "Dosen";
                } else {
                    $kuisoner[$i]['jenis_kuisioner'] = "Mata_Kuliah";
                }
                $kuisoner[$i]['respon_kuisioner'] = array();
                for ($ii=0; $ii < 5; $ii++) { 
                    $kuisoner[$i]['respon_kuisioner'][] = array(
                        'id'=>$ii,
                        'bobot' => $kuisoner[$i]['jenis_kuisioner'] == "Dosen" ? 4 : 3
                        );    
                }
        }
        
        $calcIpd = new CalculateIpd($kuisoner, $daya_tampung);
        $calcIpdFalse = new CalculateIpd($kuisoner, $daya_tampungFalse);

        $nilaiIpd = number_format(4.00, 2);
        $nilaiIpmk = number_format(3.00, 2);
        
        $this->assertEquals($nilaiIpd, $calcIpd->ipd());
        $this->assertEquals($nilaiIpmk, $calcIpd->ipmk());
        $this->assertEquals(false, $calcIpdFalse->respondenMinimum());        

    }
    
}