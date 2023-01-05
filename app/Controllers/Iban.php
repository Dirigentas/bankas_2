<?php

namespace Bankas_2\Controllers;

use Bankas_2\App;
use Bankas_2\DB\FileReader as FR;

class Iban
{
    public function home()
    {
        $pageTitle = 'Pagrindinis puslapis';

        return App::view('home', compact('pageTitle'));
    }

    public function index($status)
    {
        $pageTitle = 'Sąskaitų Sąrašas';
        $ibans = (new FR('ibans'))->showAll();
        $delete = $status;

        return App::view('iban-list', compact('ibans', 'pageTitle', 'delete'));
    }

    public function create()
    {
        $pageTitle = 'Sukurti naują sąskaitą';
        $randomIban = 'LT'. rand(10, 99) . ' 7044 0' . rand(100, 999) . ' ' . rand(1000, 9999) . ' ' . rand(1000, 9999);

        return App::view('iban-create', compact('pageTitle', 'randomIban'));
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

    public function update($id, $type)
    {
        (new FR('ibans'))->update($id, $type, $_POST);
        if ($type == 'add') {
            return App::redirect('iban_list/edit_add/'. $id);
        } else {
            return App::redirect('iban_list/edit_withdraw/'. $id);
        }
    }

    public function delete($id)
    {
        if ((new FR('ibans'))->validate($id)) {
            (new FR('ibans'))->delete($id);
            return App::redirect('iban_list/success');
        } else {
            return App::redirect('iban_list/error');
        }
    }

}
