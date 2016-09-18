<?php

$user = 'vagrant';
$pass = 'vagrant'; 

$dsn = 'mysql:host=localhost;dbname=php7dev';
$db = new PDO($dsn, $user, $pass);

?>