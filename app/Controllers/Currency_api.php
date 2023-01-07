<?php 

namespace Bankas_2\Controllers;

use Bankas_2\App;

class Currency_api
{
    public function allCurrencies()
    {
        $pageTitle = 'Valiutų kursai';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://anyapi.io/api/v1/exchange/rates?apiKey=qrgdd962vj88tl69cjjql8jco145blq6g1pmj793eao89160jeh2ol');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $currencies= json_decode(curl_exec($ch), 1);

        curl_close($ch);

        return App::view('currencies', compact('currencies', 'pageTitle'));
    }


    // public function jsUsers()
    // {
    //     $pageTitle = 'Users | JS';

    //    return App::view('users-js-list', compact('pageTitle'));
    // }


}