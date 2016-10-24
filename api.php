<?php 
require_once __DIR__.'/Core/config.php';
header("Access-Control-Allow-Origin: *");
// header('Content-Type: application/json');
header("Content-Type: application/json;charset=UTF-8");

$data = json_decode(file_get_contents("php://input"));

$work = new \App\Models\DB\DbClient;

 $output = $work->getIt('person')->results();

// foreach($allResults as $row) {
//     $output[]["id"]        = $row["id"];
//     $output[]["fname"]     = $row["fname"];
//     $output[]["lname"]     = $row["lname"];
//     $output[]["email"]     = $row["email"];
// }

// print_r(json_encode(['person' => [
//     array_values($response)
//     ]], JSON_FORCE_OBJECT));





for($i = 0; $i<count($output); $i++){
   
    $response["contacts"][$i] = [];
    $response["contacts"][$i]["id"] = $output[$i]["id"];
    $response["contacts"][$i]["fname"] = $output[$i]["fname"];
    $response["contacts"][$i]["lname"] = $output[$i]["lname"];
    
}

json_encode($response, JSON_PRETTY_PRINT);






?>