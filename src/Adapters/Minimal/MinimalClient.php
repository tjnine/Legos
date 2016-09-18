<?php 
namespace App\Adapters\Minimal;

use App\Adapters\Minimal\EuroAdapter;
use App\Adapters\Minimal\DollarCalc;
use App\Adapters\Minimal\ITarget;

class MinimalClient
{
    private $requestNow,
            $dollarRequest;

    public function __construct()
    {
        $this->requestNow = new EuroAdapter;
        $this->dollarRequest = new DollarCalc;

        $euro = "&#8364;";
        echo "Euros: $euro" . $this->makeAdapterRequest($this->requestNow) . "<br>";
        echo "Dollars: " . $this->makeDollarRequest($this->dollarRequest);
    }

    private function makeAdapterRequest(ITarget $req)
    {
        return $req->requestCalc(40,50);
    }

    private function makeDollarRequest(DollarCalc $req)
    {
        return $req->requestCalc(40,50);
    }
}


?>