<?php 
namespace App\Controllers;

use App\Factories\Simple\GraphicFactory;
use App\Factories\Simple\TextFactory;

class SimpleClient
{
#This class acts as a controller, it instantiates new instances of the GraphicFactory
#and TextFactory class object, we then call the startFactory() method which returns our
#abstract function factoryMethod(), remember we extend the Creator clas in our TextFactory
#and GraphicFactory class object.

	private $graphicObject,
			$textObject;

	public function __construct()
	{
		$this->textObject = new TextFactory;
		echo $this->textObject->startFactory() . "<br />";

		$this->graphicObject = new GraphicFactory;
		echo $this->graphicObject->startFactory() . "<br />";
	}

}

?>