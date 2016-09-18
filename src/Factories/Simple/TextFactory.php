<?php 
namespace App\Factories\Simple;

use App\Factories\Simple\Creator;
use App\Factories\Simple\Product;
use App\Factories\Simple\TextProduct;

class TextFactory extends Creator 
{
#TextFactory extends the abstract class Creator which allows us to use the factoryMethod()
#we instantiate a new TextProduct class, which implements the Product interface. THis
#allows us to use the getProperties() method.


	protected function factoryMethod()
	{
		$product = new TextProduct;
		return($product->getProperties());
	}

}


?>