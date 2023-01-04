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
                
        return App::view('iban-list', compact('ibans', 'pageTitle'));
    }


}
