<?php

namespace Bankas_2\Controllers;

use Bankas_2\App;
use Bankas_2\DB\FileReader as FR;

class Iban
{
        public function index()
    {
        $ibans = (new FR('ibans'))->showAll();
        $pageTitle = 'Sąskaitų Sąrašas';
        // return App::view('grybas-list', compact('grybai', 'pageTitle'));
        return $ibans;
    }


    // public function sum($a, $b)
    // {
    //     $result = $a + $b;
    //     $pageTitle = 'Calculator | SUM';

    //     // return App::view('calculator', ['result' => $result]);
    //     return App::view('calculator', compact('result', 'pageTitle'));
    // }
}
