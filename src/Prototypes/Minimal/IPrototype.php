<?php 
namespace App\Prototypes\Minimal;

abstract class IPrototype
{
	public $eyeColor,
		   $wingBeat,
		   $unitEyes;

    abstract function __clone();
}

?>