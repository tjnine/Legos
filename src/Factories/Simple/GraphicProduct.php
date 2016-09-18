<?php 
namespace App\Factories\Simple;

use App\Factories\Simple\Product;

#this class acts more or less like a model, responsible for retrieving data

class GraphicProduct implements Product
{
#GraphicProduct implements the Product interface class which enable us to use the
#getProperties() method, this method is what returns our data. Which is then called
#by a controller/Client class.

	private $mfgProduct;

	public function getProperties()
	{
		$this->mfgProduct = '<img src="../../public/assets/img/factory_method_simple.png" width="350" height="250" />';
		return $this->mfgProduct;
	}
}

?>