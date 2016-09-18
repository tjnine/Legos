<?php 
namespace App\Factories\Simple;

use App\Factories\Simple\Product;

class TextProduct implements Product
{
	private $mfgProduct;

	public function getProperties()
	{
		$this->mfgProduct = '<h3 style="text-align:center;">Factory Method</h3>';
		return $this->mfgProduct;
	}
}

?>