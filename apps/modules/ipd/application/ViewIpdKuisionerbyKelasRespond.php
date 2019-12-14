<?php

namespace Idy\Ipd\Application;

use Idy\Ipd\Domain\Model\CalculateIpd;

class ViewIpdKuisionerbyKelasRespond
{
    public $hasilIpd;
    public $errors;

    public function __construct(CalculateIpd $hasilIpd = null , $errors = null){
        $this->hasilIpd = $hasilIpd;
        $this->errors = $errors;
    }

    public function hasilIpd(){
        return $this->hasilIpd;
    }

    public function errors(){
        return $this->errors;
    }

}