<?php 
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/Core/config.php';

?>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
<?php include __DIR__.'/Views/includes/header.php'; ?>

	<div class="row">
		

		<div class="col-sm-10 col-md-offset-1">
			<h3 style="text-align:center;">Simple Example</h3>
			
		<pre>
		>>CloneMe.php
		abstract class CloneMe{
			public  $name,
					$picture;

			abstract function __clone();
		}

		>>Person.php
		class Person extends CloneMe{
			public function __construct(){
				$this->picture = 'eye.jpg';
				$this->name = 'Cloned Once';
			}

			public function display(){
				echo 'img src="$this->picture"';
				echo $this->name;
			}

			function __clone(){}
		}

		$worker = new App\Prototypes\Simple\Person; 
		$worker->display();

		$cloned = clone $worker;
		$cloned->name = "Cloned Twice";
		$cloned->display();
		</pre>
			<div class="panel panel-primary">
				<div class="panel-heading">Simple Prototype Example</div>
				<div class="panel-body">
		<?php 
		//original prototype
		$worker = new App\Prototypes\Simple\Person; 
		$worker->display();

		$cloned = clone $worker;
		$cloned->name = "Cloned Twice";
		$cloned->display();
		?>
				</div>
			</div>
		</div>

		<div class="col-sm-10 col-md-offset-1">
			<h3 style="text-align:center;">Minimal Example</h3>
			<h6>The abstract class interface and concrete implementation</h6>
			<p>In this example consider an expirement using flies. The goal is to set up a prototype fly then, whenever a mutation occures build the mutation. The concrete classes set up a baseline for standard values for flies, and mutations can be measured as devaitions from the baseline. <b>An abstract class provides the baseline variables.</b>
				The two concrete class implementations of the prototype (IPrototype) represent the fly genders, the variable(gender), and gender behaviours (mating and reproducing eggs). The abstract class also includes an abstract method based on the __clone() method.
				<pre>
abstract class IPrototype {
	public  $eyeColor,
			$wingBeat,
			$unitEyes;
	abstract function __clone();
}
				</pre>
				The two implementations of Iprototype differenatiate between gender using constants labeling one MALE and one FEMALE. The male has a $mated boolean variable set to true after the male has mated and the famale has a $fecundity variable containing a numeric value representing how capable the fly is at reproducing
				Importantly, both concrete implemenations of IPrototype have an implemented __clone() method even though the implementation is nothing more than adding two curly braces to the statement. The __clone() method is built into PHP with encapsulated code that will do the required work for this particular pattern. Both implementations include literals (numbers, strings, booleans) for the assigned values. This way the mutations can be measured as a deviation from these values.
				<pre>
class MaleProto extends IPrototype{
	const gender = "MALE";
	public $mated;

	public function __construct(){
		$this->eyeColor = "red";
		$this->wingBeat = "220";
		$this->unitEyes = "760";
	}

	function __clone(){}
}

class FemaleProto extends IPrototype{
	const gender = "FEMALE";
	public $fecundity;

	public function __construct(){
		$this->eyeColor = "red";
		$this->wingBeat = "220";
		$this->unitEyes = "760";
	}

	function __clone(){}
}
				</pre>
				While not rare in design patterns, the Client class is included as an integral particpiant in the Prototype pattern. The reason for this is that while the concrete implementations of the child classes serve as templates for the instances, the work of actually cloning the instances using the same template is carried out by the Client class. The two concrete implementations of the prototype are very simple and use direct value assignments to the shared variables of eyeColor, wingBeat, and unitEyes; they don't even have getter/setter methods. This is so we can focus on seeing how those properties are used by the cloned implementations of the classes' instances; $fly1 and $fly2 are insantiated from the concrete class and $c1Fly, $c2Fly, and $c1Fly, $c2Fly, and $updatedCloneFly are all clones of one or the other of the two class instances.
				<pre>
class Client{
	//for direct instatiation
	private $fly1,
			$fly2;

	//for cloning
	private $c1Fly,
			$c2Fly,
			$updatedCloneFly;

	public function __construct(){
	//instatiate
		$this->fly1 = new MaleProto();
		$this->fly2 = new FemaleProto();
	
	//clone
	$this->c1Fly = clone $this->fly1;
	$this->c2Fly = clone $this->fly2;
	$this->updatedCloneFly = clone $this->fly2;
	
	//update clones
	$this->c1Fly->mated = "true";
	$this->c2Fly->fecundity = "186";

	$this->updatedCloneFly->eyeColor = "purple";
	$this->updatedCloneFly->wingBeat = "220";
	$this->updatedCloneFly->unitEyes = "750";
	$this->updatedCloneFly->fecundity = "92";

	//Send through w/ type hinting method
	$this->showFly($this->c1Fly);
	$this->showFly($this->c2Fly);
	$this->showFly($this->updatedCloneFly);
	}

	private function showFly(IPrototype $fly){
		echo "Eye Color:" . $fly->eyeColor . EOL;
		echo "Wing Beats/ second:" . $fly->wingBeat . EOL;
		echo "Eye Units:" . $fly->unitEyes . EOL;
		$genderNow = $fly::gender;
		echo "Gender" . $genderNow . EOL;

		if($genderNow == "FEMALE"){
			echo "Number of Eggs:" . $fly->fecundity . EOL;
		}else {
			echo "Mated:" . $fly->mated . EOL;
		}
	}
}

//we then call the client wherever we want out info
$worker = new Client;
				</pre>
			</p>
			<div class="panel panel-primary">
				<div class="panel-heading">Minimal Prototype Instantiation</div>
				<div class="panel-body">
					<p>
						<?php $worker = new App\Controllers\ProtoClient; ?>
					</p>
				</div>
			</div>
		</div>

		<div class="col-sm-10 col-md-offset-1">
			<h3 style="text-align:center;">OOP Example</h3>
			<p>
				<h6> Encapsulation in the interface</h6>
				The first thing this Prototype implementation does is add OOP to the programs interface - which is an abstract class. <b>Like all Prototype interfaces, this includes an abstract cloning operation</b>. It also includes both abstract and concrete getters and setters. The abstract getter/setter pair leaves the specific implementation up to three concrete prototype implementations. The other getter/setter methods are more generally applicable to such things as employee names, ID codes, and photos. Not that all the properties are protected, so even though the concrete getters/setters have public visibility, the protected visibility of properties used in the operations affords a degree of encapsulation.
				<i>Synopsis: In the next example the Engineerting dept is responsible for creating the product, MGMT handles coordinating and organizing resources, and Marketing is in charge of sales and promotion of the product</i>
				<pre>
abstract class IAcmePrototype{
	protected $name,
			  $id,
			  $employeePic,
			  $dept;

	abstract function setDept($orgCode);
	abstract function getDept();

	public function setName($empName){
		$this->name = $empName;
	}
	public function getName(){
		return $this->name;
	}

	public function setId($empId){
		$this->name = $empId;
	}
	public function getId(){
		return $this->id;
	}

	public function setPic($empPic){
		$this->employeePic = $empPic;
	}
	public function getPic(){
		return $this->employeePic;
	}

	abstract function __clone();
}

//Example of 1 of the 3 concrete Prototype classes (since they all follow the same pattern)
class Marketing extends IAcmePrototype{
	const UNIT = "Marketing";
	private $sales = "sales";
	private $protmotion = "promotion";
	private $strategic = "strategic planning";

	public function setDept($orgCode){
		switch($orgCode){
			case 101:
			$this->dept = $this->sales;
			break

			case 102:
			$this->dept = $this->promotion;
			break;

			case 103:
			$this->dept = $this->strategic;
			break;

			default:
			$this->dept = "unrecognized";
		}
	}

	public function getDept(){
		return $this->dept;
	}

	function __clone(){}
}

class Client{
	private $market,
			$manage,
			$engineer;

	public function __construct(){
		$this->makeProto();
		
		$cTess = clone $this->market;
		$this->setEmployee($cTess, "Tess Smith", 101, "ts101-1234", "tess.png");
		$this->showEmployee($cTess);
	}

	private function makeProto(){
		$this->market = new Marketing;
		$this->manage = new Management;
		$this->engineer = new Engineering;
	}

	//use the getters from IAcmePrototype
	private function showEmployee(IAcmePrototype $employeeNow){
		$px = $employeeNow->getPic();
        echo ">div class='col-md-3'>img src='" . IMG  . $px . "' width='150' height='150' />br<";
        echo $employeeNow->getName() . ">br>";
        echo $employeeNow->getDept() . ": " . $employeeNow::UNIT . ">br>";
         echo $employeeNow->getId() . ">/div>";
	}
	
	//use the setter from IAcmePrototype
	private function setEmployee(IAcmePrototype $employeeNow, $nm, $dp, $id, $px){
		$employeeNow->setName($nm);
		$employeeNow->setDept($dp);
		$employeeNow->setId($id);
		$employeeNow->setPic($px);
	}
}

//from our controller
$worker = new App\Prototypes\Oop\Client
				</pre>
			</p>

			<div class="panel panel-primary">
				<div class="panel-heading">OOP Prototype</div>
				<div class="panel-body">
					<?php $worker = new App\Prototypes\Oop\OopClient; ?>
				</div>
			</div>
		</div>
	
	
<div class="col-sm-10 col-sm-offset-1">
			<h3 style="text-align:center;">Dynamic Object Instantiation</h3>
			<p>
			In our last example we hardcoded our properties with strings, in a real application this is not ideal. Realisticly we would be bringing data in from json, xml, or a database. Using these techniques you can dynamically create and clone objects from data coming from a database, array, or anywhere else in your program gets its data. In the following example, imagine that instead of an array, the data is coming from a database. The same principles apply. Also note that we are using an interface class instead of an abstract class.
			<pre>
	//method 1 of dynamic creation (class::MyClass)
	$var = "MyClass";
	$obj = new $var;

	//method 2 of dynamic creation
	$obj = new MyClass;

	interface IPrototype{
		const PROTO = "IPrototype";
		function __clone();
	}

	class DynamicObjectNaming implements IPrototype{
		const CONCRETE = "[Concrete] DynamicObjectNaming";

		public function __construct(){
			echo "This was dynamically created.";
		}
		public funtion doWork(){
		echo "this is the assigned task.";
		}
		function __clone();
	}

	$employeeData = ['DynamicObjectNaming', 'Tess', 'mar', 'John', 'eng', 'Olivia', 'man'];
	$don = $employeeData[0];
	$employeeData[6] = new $don;
	echo $employeeData[6]::CONCRETE;
	$employeeData[6]->doWork();

	$employeeName = $employeeData[5]; //Olivia = employeeName
	$employeeName = clone $employeeData[6];//our object instantiation of DynamicObjectNaming
	echo $employeeName->doWork();
	echo "this is a clone of" . $employeeName::CONCRETE;
	echo "child of:" . $employeeName::PROTO;

			</pre>
			</p>
		</div>
</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>