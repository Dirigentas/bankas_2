<?php
// šis failas atitinka REQ

// define('URL', 'http://bankas_2.lt/');

use Bankas_2\App;

require __DIR__ . '/../vendor/autoload.php';


$response = App::start();
echo $response;
