<?php 
namespace App\Prototypes\Minimal;

use App\Prototypes\Minimal\IPrototype;

class MaleProto extends IPrototype
{
    public $mated = TRUE;
    const gender = "MALE";

    public function __construct()
    {
        $this->eyeColor = "red";
        $this->wingBeat = "220";
        $this->unitEyes = "760";
    }

    function __clone(){}
}

?>