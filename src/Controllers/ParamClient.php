<?php 
namespace App\Controllers;

use App\Factories\Parameter\SocialFactory;
use App\Factories\Parameter\SocialProduct;

class ParamClient 
{
	private $socialFactory;

	public function __construct()
	{
		$this->socialFactory = new SocialFactory;
		return $this->socialFactory->doFactory(new SocialProduct);
	}
}


?>