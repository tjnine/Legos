<?php 
namespace App\Adapters\Minimal;

class DollarCalc
{
    private $dollar,
            $product,
            $service;
    public $rate = 1;

    public function requestCalc($productNow, $serviceNow)
    {
        $this->product = $productNow;
        $this->service = $serviceNow;
        $this->dollar = $this->product + $this->service;
        return $this->requestTotal();
    }

    public function requestTotal()
    {
        $this->dollar *= $this->rate;
        return $this->dollar;
    }
}

 ?>