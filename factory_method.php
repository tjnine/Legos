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
		<div class="col-sm-10 col-sm-offset-1">
		<h3>DB Factory Test</h3>
<p>
<?php
 $worker = new App\Models\DB\DbClient; 
 $result = $worker->getIt("person");
	 foreach($result as $k){
	 	echo "Hello {$k[1]}  {$k[2]}";
	 }
 ?>	
</p>
			<p>
The factory method pattern makes use effective use of polymorphism and encapsulation by coding to an abstract class (non concrete classes which can't return objects) and an interface(only lists functions). Also we use private and protected objects so that only the classes calling these objects have access to them. The simple example does not make use of parameters so making use of multiple items is extremely limited (we would have to create a class for each new graphic or text product and factory we wanted to add). <b>Remember</b> the factory class is extending the abstract class Creator and calling the product while the product class is setting the content.				
			</p>
			<p>
Both implementations of the factory method pattern shown accomplish the same goals but are different in their implementation. One of the key differences between the simple and parameterized factory methods is that in the simple design, the client holds references to the factory and the product. In the parameterized request,the Client class must name the product, not just the product factory. The parameter in the factoryMethod() operation is a product passed by the client, so the client must reference the concrete product it wants. However, that request is still through the Creator interface. So even though the client has a reference to a product, it's still seperated from the product throuh the Creator class.
			</p>
			<p>
The parameterized factory method is simpler because the client has to deal with only a single factory. The factory method has a signle parameter that directs the creation of the desired product. In the simple factory method example, each product had its own factory and no parameter to pass, it relied on unique factories for each product. To implement the parameterized factory method we could combine the text and graphic products into one class. We can handle them both as an entity without breaking the single responsibility principle. The single responsibility of our new class is to output text and graphics to display a map (or a social media profile). 
			</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="panel-title">Simple Factory Method Pattern</h4>
				</div>
				<div class="panel-body">
					<p><?php $worker = new App\Controllers\SimpleClient; ?></p>
					
					<pre>
>>Product.php
interface Product {
	public function getProperties();
}

>>Creator.php
abstract class Creator {
	protected abstract funtion factoryMethod();

	public function startFactory(){
		$mfg = $this->factoryMethod();
		return $mfg;	
	}	
}

>>GraphicFactory.php
class GraphicFactory extends Creator {
	protected function factoryMethod(){
		$product = new GraphicProduct;
		return($product->getProperties());
	}
}

>>GraphicProduct.php
class GraphicProduct implements Product {
	private $mfgProduct;

	public function getPropeties(){
		$this->mfgProduct = 'an html img tag goes here';
		return $this->mfgProduct;
	}
}
					</pre>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="panel-title">Parameterized Factory Method Pattern</h4>
				</div>
				<div class="panel-body">
					<p><?php $workerParams = new App\Controllers\ParamClient; ?></p>
					
					<pre>
>>Creator.php
abstract class Creator {
	protected abstract function factoryMethod(Product $product);

	public function doFactory($productNow){
		$newProduct = $productNow;
		$mfg = $this->factoryMethod($newProduct);
		return $mfg;
	}
}

>>SocialFactory.php
class SocialFactory extends Creator{
	private $social;

	protected function factoryMethod(Product $product){
		$this->social = $product;
		return($this->product->getProperties());
	}
}

>>Product.php
interface Product{ public function getProperties();}

>>SocialProduct.php
class SocialProduct implements Product{
	private $mfgProduct;

	public function getProperties(){
		$this->mfgProduct = 'a bunch of content';
		return $this->mfgProduct;
	}
}

>>ParamClient.php
class ParamClient{
	private $socialFactory;

	public function __construct(){
		$this->socialFactory = new SocialFactory;
		echo $this->socialFactory->doFactory(new SocialProduct);
	}
}
					</pre>
				</div>
			</div>
		</div>
	</div>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>