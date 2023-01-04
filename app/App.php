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

        return '404 NOT FOUND';
    }

    // public static function view(string $__name, array $data)
    // {
    //     ob_start();

    //     extract($data);

    //     require __DIR__ . '/../view/' . $__name . '.php';

    //     $out = ob_get_contents();
    //     ob_end_clean();

    //     return $out;
    // }
}
