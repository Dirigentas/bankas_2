<?php

namespace Bankas_2;

use Bankas_2\Controllers\Iban;

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

        if ($url[0] == 'iban_list' && count($url) == 1 && $method == 'GET') {
            return (new Iban)->index();
        }

        if ($url[0] == 'new_iban' && count($url) == 1 && $method == 'GET') {
            return (new Iban)->create();
        }
        
        if ($url[0] == 'new_iban' && $url[1] == 'save' && count($url) == 2 && $method == 'POST') {
            return (new Iban)->save();
        }

        if ($url[0] == 'iban_list' && $url[1] == 'edit_add' && count($url) == 3 && $method == 'GET') {
            return (new Iban)->edit_add($url[2]);
        }

        if ($url[0] == 'iban_list' && $url[1] == 'edit_withdraw' && count($url) == 3 && $method == 'GET') {
            return (new Iban)->edit_withdraw($url[2]);
        }

        if ($url[0] == 'iban_list' && $url[1] == 'update' && count($url) == 4 && $method == 'POST') {
            return (new Iban)->update($url[3], $url[2]);
        }

        return '404 NOT FOUND'. $_SERVER['REQUEST_METHOD'];
    }

    public static function view(string $__name, array $data)
    {
        ob_start();

        extract($data);

        require __DIR__ . '/../view/header.php';
        
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
