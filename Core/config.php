<?php
session_start();

require_once __DIR__ .'/../vendor/autoload.php';


$GLOBALS['config'] = [
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