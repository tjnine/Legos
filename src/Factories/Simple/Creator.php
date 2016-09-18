<?php 
namespace App\Factories\Simple;


abstract class Creator 
{

	protected abstract function factoryMethod();

	#startFactory() expects that the factoryMethod() will return a product object.
	#So the concret implementation of factoryMethod() needs to build and return a product
	#object implemented from a Product interface.

	#Two concrete factory class extend Creator and implement the factoryMethod(). 
	#The factoryMethod() implementation returns a text or graphic product through a
	#Product method called getProperties(). The TextFactory and GraphicFactory 
	#implementations incorporate getProperties()
	public function startFactory()
	{
		$mfg = $this->factoryMethod();
		return $mfg;
	}
}

?>