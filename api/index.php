<?php 
require_once __DIR__.'/../Core/config.php';

 $work = new \App\Models\DB\DbClient;

$results = [];
// while($stmt = $work->getIt('person')) {
//     $results[] = $stmt;
// }

$resultJSON = json_encode(['person' => $results]);

print_r($resultJSON);



?>