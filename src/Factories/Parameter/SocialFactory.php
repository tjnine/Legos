<?php 
namespace App\Factories\Parameter;

use App\Factories\Parameter\Creator;
use App\Factories\Parameter\Product;

class SocialFactory extends Creator
{
	private $profile;

	protected function factoryMethod(Product $product)
	{
		$this->profile = $product;
		return($this->profile->getProperties());
	}
}


?>