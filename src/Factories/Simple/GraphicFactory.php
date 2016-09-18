<?php 
namespace App\Factories\Simple;

use App\Factories\Simple\Creator;
use App\Factories\Simple\Product;
use App\Factories\Simple\GraphicProduct;

class GraphicFactory extends Creator
{
#GraphicFactory extends the abstract class Creator which allows us to use the factoryMethod()
#we instantiate a new GraphicProduct class, which implements the Product interface. THis
#allows us to use the getProperties() method.
	protected function factoryMethod()
	{
		$product = new GraphicProduct;
		return($product->getProperties());
	}
}

?>