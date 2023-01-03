<?php

namespace Bankas_2\Controllers;

use Bankas_2\App;

class Calculator
{
    public function sum($a, $b)
    {
        $result = $a + $b;
        $pageTitle = 'Calculator | SUM';

        // return App::view('calculator', ['result' => $result]);
        return App::view('calculator', compact('result', 'pageTitle'));
    }
}
