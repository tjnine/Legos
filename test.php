<?php

require_once __DIR__.'/Core/config.php';

/**
 * Database Model 
 */
$work = new \App\Models\DB\DbClient;

$output = $work->getIt('person')->results();

foreach($output as $row) {
    $output[]["id"]        = $row["id"];
    $output[]["fname"]     = $row["fname"];
    $output[]["lname"]     = $row["lname"];
    $output[]["email"]     = $row["email"];
    echo "<h1>{$row["fname"]}</h1>";
}

print_r(json_encode(['person' => [
    array_values($output)
    ]], JSON_FORCE_OBJECT));
?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/lumen/bootstrap.min.css">
    
</head>
<body>
<?php include __DIR__.'/Views/includes/header.php'; ?>
    <div class="row">

     <?php
     #STATIC CLASS INSTANTIATION EXAMPLE

      // App\Models\Core\Config::get('session/session_name'); 


     ?>
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Creational Patterns</h4>
                </div>
                <div class="panel-body">
                    <p><i>Creational patterns states, in a system made up of objects composed of other objects, the creation of any single object shouldn't depend on the creator. In other words, objects should not be tightly bound to the processes that create the objects.</i></p>
                    <div class="btn-group" role="group" aria-label="PHP Design Patterns">
                    <button type="button" class="btn btn-default"> <a href="factory_method.php">Factory Method</a></button>
                    <button type="button" class="btn btn-default"><a href="prototype.php">Prototype</a></button>
                    
                    </div>
                <ul class="list-group">
                    <li class="list-group-item">Factory Method pattern is great for when developers know that they will have to create content for an application like text or graphics but has no idea how many to create. </li>
                    <li class="list-group-item">Prototype design pattern is best used for when your project requires that you create several instances of a prototypical object. From one instantiation you can clone as many mutations as required with no further need to create another instance from the original concrete class.</li>
                    
                </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Structural Design Patterns</h4>
                </div>
                <div class="panel-body">
                    <p><i>Structural patterns examine how objects and classes are composed to form larger structures. New structures are created through multiple inheritance. One class inherits from more than a single parent class to create a new structure. These patterns focus on creating new structures from existing ones with loose coupling for resuse.</i></p>
                    <div class="btn-group" role="group" aria-label="PHP Design Patterns">
                    <button type="button" class="btn btn-default"> <a href="adapter.php">Adapter</a></button>
                    <button type="button" class="btn btn-default"><a href="bridge.php">Bridge</a></button>
                    <button type="button" class="btn btn-default"><a href="composite.php">Composite</a></button>
                    <button type="button" class="btn btn-default"><a href="decorator.php">Decorator</a></button>
                    <button type="button" class="btn btn-default"><a href="facade.php">Facade</a></button>
                    <button type="button" class="btn btn-default"><a href="flyweight.php">Flyweight</a></button>
                    <button type="button" class="btn btn-default"><a href="proxy.php">Proxy</a></button>
                    </div>
                <ul class="list-group">
                    <li class="list-group-item">The Adapter pattern is important for bringing together 2 incompatibale systems through an adaptation using either multiple inheritance (PHP doesn't have this - there's a workaround) or through composition.</li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                </ul>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
