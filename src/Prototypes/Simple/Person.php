<?php 
namespace App\Prototypes\Simple;

use App\Prototypes\Simple\CloneMe;

class Person extends CloneMe
{
	

	public function __construct()
	{
		//constants must be defined within functions if inside a class
		define('IM', '/public/assets/img');
		$this->picture = IM . "/eye.jpg";
		$this->name = 'Cloned Once';
	}

	public function display()
	{
	echo $output = 
	<<<EOD
			<div class='col-md-5 col-md-offset-1'>
				<p><img src='{$this->picture}'></p>
				<h4 style='text-align:center;'>{$this->name}</h4>
			</div>
EOD;
	}

	function __clone(){}
}


?>