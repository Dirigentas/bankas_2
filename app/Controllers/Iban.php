<?php

namespace Bankas_2\Controllers;

use Bankas_2\App;
use Bankas_2\DB\FileReader as FR;

class Iban
{
        public function index()
    {
        $pageTitle = 'Sąskaitų Sąrašas';
        $ibans = (new FR('ibans'))->showAll();

        return App::view('iban-list', compact('ibans', 'pageTitle'));
    }

        public function create()
    {
        $pageTitle = 'Sukurti naują sąskaitą';
        $hidden = rand(0, 99999);
        $randomIban = 'LT'. rand(10, 99) . ' 7044 0' . rand(100, 999) . ' ' . rand(1000, 9999) . ' ' . rand(1000, 9999);

        return App::view('iban-create', compact('pageTitle', 'hidden', 'randomIban'));
    }

    public function save()
    {
        (new FR('ibans'))->create($_POST);
        return App::redirect('new_iban');
    }

    public function edit_add($id)
    {
        $pageTitle = 'Pridėti lėšas';
        $iban = (new FR('ibans'))->show($id);
        return App::view('edit_add', compact('pageTitle', 'iban'));
    }
    public function edit_withdraw($id)
    {
        $pageTitle = 'Nusiimti lėšas';
        $iban = (new FR('ibans'))->show($id);
        return App::view('edit_withdraw', compact('pageTitle', 'iban'));
    }

    public function update($id)
    {
        (new FR('ibans'))->update($id, $_POST);
        return App::redirect('iban_list/edit_add/'. $id);
    }

}
