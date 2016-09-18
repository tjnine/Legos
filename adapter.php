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
   <!-- inheritance example -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="col-sm-8 col-sm-offset-2">
              <p>  <img src="./public/assets/img/adapter-1.png" alt=""></p>
              <p style="text-align:center;"> <i> Adapter designs work on the same principle as a usb adaptor for your mobile phone. In the image above we are using an anology of making a mobile application from an existing desktop cms applicaiton.</i></p>
                 <img src="./public/assets/img/adapter.png" width="500" height="300">
                    <p>You will find a lot of uses for the Adapter pattern expescially if you use vendor-supplied packages or other modules that sometimes need an adapter to use with existing software.</p>

                  <p>
                <h5>The Adapter Pattern Using Inheritance</h5>
                The class Adapter pattern is relatively easy but less flexible than the object version of the Adapter pattern. It's easier because it inherits its functionality from the Adaptee participant - so there is less to recode in the Adapter. PHP doesn't support multiple inheritnce natively but PHP can fake dual inheritance. When implementing the class Adapter pattern, on of the participants needs to be a PHP interface.
                <pre>
    //PHP Dual inheritance
    class ChildClass extends ParentClass implements SomeInterface
                </pre>
            </p>        
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Adapter Pattern - Inheritance</h4>
                </div>
                <div class="panel-body">
                <p>
                    In the following example we have a currency converter that can calculate transactions in US dollars but we want to be able to use Euros as well. Without having to change a class that calculates how many dollars are involved in a transaction, the dev wants something that will handle said transactions in euros too. By adding an Adapter, the program can calculate either dollars or euros.
                    To begin, we have a perfectly good class DollarCalc that adds the values of purchased services and product, then returns the total.
                    <pre>
class DollarCalc {
    private $dollar,
            $product,
            $service;
    public $rate = 1;

    public function requestCalc($productNow, $serviceNow){
        $this->product = $productNow;
        $this->service = $serviceNow;
        $this->dollar = $this->product + $this->service;
        return $this->requestTotal();
    }

    public function requestTotal(){
        $this->dollar *= $this->rate;
        $return $this->dollar;
    }
}

class EuroCalc {
    private $euro,
            $product,
            $service;
    public $rate = 1;

    public function requestCalc($productNow, $serviceNow){
        $this->product = $productNow;
        $this->service = $serviceNow;
        $this->euro = $this->product + $this->service;
        return $this->requestTotal();
    }

    public function requestTotal(){
        $this->euro *= $this->rate;
        return $this->euro;
    }
}
                    </pre>
                    Note that only property names have changes so plugging this class into an existing application would not amount to much since the entire applications data is in dollars. In other words you can't plug the euro conversions into your application without redoing the entire application. We need an adapter for EuroCalc. The dev can now implement the request() method to request euros instead of dollars. We now can implement the concrete class EuroCalc and the ITarget interface with the Adapter. 
                    <pre>
interface ITarget {
    function requester();
}
           
class EuroAdapter extends EuroCalc implements ITarget {
    public function __construct(){
        $this->requester();
    }
    function requester(){
        $this->rate = .8111;
        return $this->rate;
    }
}

class Client {
    private $requestNow,
            $dollarRequest;

    public function __construct(){
        $this->requestNow = new EuroAdapter();
        $this->dollarRequest = new DollarCalc();

        $euro = "&#8364";
        echo "Euros: $euro" . $this->makeAdapterRequest($this->requestNow);
        echo "Dollars: " . $this->makeAdapterRequest($this->dollarRequest);
    }

    private function makeAdapterRequest(ITargert $req){
        return $req->requestCalc(40,50);
    }

    private function makeDollarRequest(DollarCalc $req){
        return $req->requestCalc(40,50);
    }
}

$worker = new Client;
                    </pre>
<h5>Output:</h5>
 <?php $worker = new App\Adapters\Minimal\MinimalClient; ?>
                </p>
                </div>
            </div>
        </div>
    </div>

   
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Adapter Pattern - Composition</h4>
                </div>
                <div class="panel-body">
                <p>
           
                   <pre>
                       

                   </pre>
<h5>Output:</h5>
 <?php //$worker = new App\Adapters\Minimal\MinimalClient; ?>
                </p>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>