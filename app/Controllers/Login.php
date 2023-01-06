<?php

namespace Bankas_2\Controllers;

use Bankas_2\App;
use Bankas_2\DB\FileReader as FR;

class Login
{
    public function login(string $state)
    {
        $pageTitle = 'Prisijungimo puslapis';
        $state = $state;
        return App::view('login', compact('pageTitle', 'state'));
    }

    public function loginCheck()
    {
        session_start();
        
        if ((new FR('users.json'))->validateLogin($_POST['name'], $_POST['psw']))
        {
            $user = [$_POST['name'], $_POST['psw']];
            $_SESSION['user'] = $user;
            return App::redirect('home/'. $_POST['name']);
        } else {
            return App::redirect('error');
        }
    }

    public function home($userName)
    {
        $pageTitle = 'Pradinis puslapis';
        $userName = $userName;
        return App::view('home', compact('pageTitle', 'userName'));
    }

    public function logout()
    {
        unset($_SESSION['user']);
        return App::redirect('');
    }
}