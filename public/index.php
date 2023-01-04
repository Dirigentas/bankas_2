<?php
// šis failas atitinka REQ

use Bankas_2\App;

require __DIR__ . '/../vendor/autoload.php';


$response = App::start();
echo '<pre>';
print_r($response);
