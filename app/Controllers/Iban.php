<?php

namespace Bankas_2\Controllers;

use Bankas_2\App;
use Bankas_2\DB\FileReader as FR;

class Iban
{
    private $setting = 'sql'; // sql arba file

    private function storage($name)
    {
        if ($this->setting == 'file') {
             return new FR('ibans');
        }
        if ($this->setting == 'sql') {
            return new SQL('ibans');
       }
    }

    public function index($status)
    {
        $pageTitle = 'Sąskaitų Sąrašas';
        $ibans = $this->storage('grybai')->showAll();
        $delete = $status;

        return App::view('iban-list', compact('ibans', 'pageTitle', 'delete'));
    }

    public function create($result)
    {
        $pageTitle = 'Sukurti naują sąskaitą';
        $randomIban = 'LT'. rand(10, 99) . ' 7044 0' . rand(100, 999) . ' ' . rand(1000, 9999) . ' ' . rand(1000, 9999);
        $result = $result;

        return App::view('iban-create', compact('pageTitle', 'randomIban', 'result'));
    }

    public function save()
    {
        if (strlen($_POST['vardas']) < 4 || strlen($_POST['pavarde']) < 4) {
            return App::redirect('new_iban/error');
        } elseif ((new FR('ibans'))->validatePersonalId($_POST['asmens_kodas'])) {
            return App::redirect('new_iban/error2');
        } elseif (
        !is_numeric($_POST['asmens_kodas']) ||
        in_array($_POST['asmens_kodas'][0], [3, 4, 5, 6]) == 0 ||
        in_array($_POST['asmens_kodas'][3], range(0, 1)) == 0 ||
        in_array($_POST['asmens_kodas'][5], range(0, 3)) == 0 ||
        strlen($_POST['asmens_kodas']) != 11
        ) {
            return App::redirect('new_iban/error3');
        } else {
            $this->storage('ibans')->create($_POST);
            return App::redirect('new_iban/success');
        }
    }

    public function edit_add($id, $result)
    {
        $pageTitle = 'Pridėti lėšas';
        $iban = (new FR('ibans'))->show($id);
        $result = $result;
        return App::view('edit_add', compact('pageTitle', 'iban', 'result'));
    }
    public function edit_withdraw($id, $result)
    {
        $pageTitle = 'Nusiimti lėšas';
        $iban = (new FR('ibans'))->show($id);
        $result = $result;
        return App::view('edit_withdraw', compact('pageTitle', 'iban', 'result'));
    }

    public function update($id, $type)
    {
        if ($this->setting = 'file') {   
            $post = $_POST['pokytis'];
            if ((float) $post > 0 && (float) $post * 1000 % 10 === 0) {
                if ($type == 'withdraw') {
                    if ((new FR('ibans'))->validateNegative($id, $post)) {
                        return App::redirect('iban_list/edit_withdraw/'. $id . '/error2');
                    }
                }
                (new FR('ibans'))->update($id, $type, $_POST);
                if ($type == 'add') {
                    return App::redirect('iban_list/edit_add/'. $id . '/success');
                } else {
                    return App::redirect('iban_list/edit_withdraw/'. $id . '/success');
                }
            } else {
                if ($type === 'add') {
                    return App::redirect('iban_list/edit_add/'. $id . '/error');
                } else {
                    return App::redirect('iban_list/edit_withdraw/'. $id . '/error');
                }
            }
        }
        else {
            $this->storage('ibans')->update($id, $type, $_POST);
        }
    }

    public function delete($id)
    {
        if ($this->setting = 'file') {
            if ((new FR('ibans'))->validateZero($id)) {
                (new FR('ibans'))->delete($id);
                return App::redirect('iban_list/success');
            } else {
                return App::redirect('iban_list/error');
            }
        }
        else {
            $this->storage('ibans')->delete($id);
        }
    }

}
