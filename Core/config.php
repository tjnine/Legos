<?php
session_start();

require_once __DIR__ .'/../vendor/autoload.php';


$GLOBALS['config'] = [
    'mysql' => [
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => 'root',
        'database' => 'octane'
    ],
    'cookie' => [
        'cookie_name'   =>  'hash',
        'cookie_expire' =>  604800
    ],
    'session' => [
        'session_name'  =>  'user',
        'token_name'    =>  'token'
    ]
];
?>