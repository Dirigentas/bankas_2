<?php

namespace Bankas_2;   

use Bankas_2\Controllers\Iban;
use Bankas_2\Controllers\Login;

class App
{
    public static function start()
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($url);
        return self::router($url);
    }

    private static function router(array $url)
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($url[0] == '' && count($url) == 1 && $method == 'GET') {
            return (new Login)->login($url[0]);
        }

        if ($url[0] == 'tryhome' && count($url) == 1 && $method == 'POST') {
                return (new Login)->loginCheck();
        }

        if ($url[0] == 'error' && count($url) == 1 && $method == 'GET') {
                return (new Login)->login($url[0]);
        }

        session_start();
        if (!isset($_SESSION['user'])) {
            App::redirect('');
            die;
        }

        
        if ($url[0] == 'logout' && count($url) == 1 && $method == 'POST') {
                return (new Login)->logout();
        }


        if ($url[0] == 'home' && count($url) == 2 && $method == 'GET') {
            return (new Login)->home($url[1]);
        }

        if ($url[0] == 'iban_list' && $method == 'GET') {
            if (count($url) == 1) {
                return (new Iban)->index($url[1] ?? null);
            }
            if (count($url) == 2) {
                if ($url[1] == 'success' || $url[1] == 'error') {
                    return (new Iban)->index($url[1]);
                }
            }
        }

        if ($url[0] == 'new_iban' && $method == 'GET') {
            if (count($url) == 1) {
                return (new Iban)->create($url[1] ?? null);
            }
            if (count($url) == 2) {
                return (new Iban)->create($url[1]);
            }
        }
        
        if ($url[0] == 'new_iban' && $url[1] == 'save' && count($url) == 2 && $method == 'POST') {
            return (new Iban)->save();
        }

        if ($url[0] == 'iban_list' && $url[1] == 'edit_add' && $method == 'GET') {
            if (count($url) == 3) {
                return (new Iban)->edit_add($url[2], $url[3] ?? null);
            }
            if (count($url) == 4) {
                return (new Iban)->edit_add($url[2], $url[3]);
            }
        }

        if ($url[0] == 'iban_list' && $url[1] == 'edit_withdraw' && $method == 'GET') {
            if (count($url) == 3) {
                return (new Iban)->edit_withdraw($url[2], $url[3] ?? null);
            }
            if (count($url) == 4) {
                return (new Iban)->edit_withdraw($url[2], $url[3]);
            }
        }

        if ($url[0] == 'iban_list' && $url[1] == 'update' && count($url) == 4 && $method == 'POST') {
            return (new Iban)->update($url[3], $url[2]);
        }

        if ($url[0] == 'iban_list' && $url[1] == 'delete' && count($url) == 3 && $method == 'POST') {
            return (new Iban)->delete($url[2]);
        }

        return '404 NOT FOUND '. $_SERVER['REQUEST_METHOD'];
    }

    public static function view(string $__name, array $data)
    {
        ob_start();

        extract($data);

        require __DIR__ . '/../view/meta.php';

        if ($__name != 'login') {
            require __DIR__ . '/../view/header.php';
        }
        
        require __DIR__ . '/../view/' . $__name . '.php';
        
        require __DIR__ . '/../view/footer.php';

        $out = ob_get_contents();
        ob_end_clean();

        return $out;
    }

    public static function redirect($url)
    {
        header('Location: ' . URL . $url);
        return null;
    }
}
