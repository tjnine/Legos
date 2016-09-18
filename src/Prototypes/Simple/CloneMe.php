<?php 
namespace App\Prototypes\Simple;


abstract class CloneMe
{
	public $name;
	public $picture;
	
	abstract function __clone();
}

?>