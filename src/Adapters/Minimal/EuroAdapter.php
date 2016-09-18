<?php 
namespace App\Adapters\Minimal;

use App\Adapters\Minimal\EuroCalc;
use App\Adapters\Minimal\ITarget;

class EuroAdapter extends EuroCalc implements ITarget
{
    public function __construct()
    {
        $this->requester();
    }

    function requester()
    {
        $this->rate = .8111;
        return $this->rate;
    }
}

?>