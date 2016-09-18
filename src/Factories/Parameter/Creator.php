<?php 
namespace App\Factories\Parameter;


abstract class Creator
{
	protected abstract function factoryMethod(Product $product);

	public function doFactory($productNow)
	{
		$socialProduct = $productNow;
		$mfg = $this->factoryMethod($socialProduct);
		return $mfg;
	}
}

?>