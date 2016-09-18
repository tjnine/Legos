<?php 
namespace App\Prototypes\Minimal;

use App\Prototypes\Minimal\IPrototype;

class FemaleProto extends IPrototype
{
    public $fecundity;
    const gender = "FEMALE";
    
    public function __construct()
    {
        $this->eyeColor = "red";
        $this->wingBeat = "220";
        $this->unitEyes = "760";
    }

    function __clone(){}
}


?>