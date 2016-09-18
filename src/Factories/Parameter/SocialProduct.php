<?php 
namespace App\Factories\Parameter;

use App\Factories\Parameter\Product;

class SocialProduct implements Product
{
	private $mfgProduct;
	private $socialNow;

	public function getProperties()
	{
		$this->socialNow = file_get_contents("./Core/Text/factory_method.txt");
		$this->mfgProduct = <<<TEXT
			<h3 style="text-align:center;">Factory Method w/ Params</h3>	
			<p><img src="./public/assets/img/factory_method_1.png" width="300" height="200" alt="social media profile"></p> 
			<p>{$this->socialNow}</p>
			<p>This is content hardcoded inside App\Factories\Parameter\SocialProduct.php but could easily be grabbing data from an api via CURL or DB via a model or like we did in this example (load text from a .txt file)</p>
TEXT;
	
		echo $this->mfgProduct;
	}
}

?>