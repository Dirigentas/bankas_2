<?php

namespace Bankas_2\Controllers;
use Bankas_2\App;
use Bankas_2\DB\FileReader as FR;



class Login
{
    public function login()
    {
        $pageTitle = 'Prisijungimo puslapis';

        return App::view('login', compact('pageTitle'));
    }

    public function logout()
    {
        unset($_SESSION['user']);
        return App::redirect('');
    }

    public function loginCheck()
    {
        
        if ((new FR('users.json'))->validateLogin($name))
        {
            $pageTitle = 'Pagrindinis puslapis';
            return App::view('home', compact('pageTitle'));
        } else {
            $pageTitle = 'Prisijungimo puslapis';
            return App::view('login', compact('pageTitle'));
        }
    }
}

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // if (isset($_GET['logout'])) {
    //     unset($_SESSION['user']);
    //     header('Location: http://localhost/bankas_1/php/log.php');
    //     die;
    // }

    $users = json_decode(file_get_contents(__DIR__ . '/users.json'), 1);

    foreach ($users as $user) {
        if ($user['name'] == $_POST['name']) {
            if ($user['psw'] == md5($_POST['psw'])) {
                $_SESSION['user'] = $user;
                header('Location: http://localhost/bankas_1/php/iban_list.php');
                die;
            }
        }
    }
    header('Location: http://localhost/bankas_1/php/log.php?error');
    die;
}

if (isset($_GET['error'])) {
    $error = 'User name and password combination is incorrect, please try again';
}
