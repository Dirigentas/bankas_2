<?php

namespace Bankas_2;

use Bankas_2\Controllers\Calculator;

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

        if ($url[0] == 'calculator' && in_array($url[1], ['sum', 'diff', 'mult', 'div']) && count($url) == 4) {
            return (new Calculator)->{$url[1]}($url[2], $url[3]);
        }

        return '404 NOT FOUND';
    }

    public static function view(string $__name, array $data)
    {
        ob_start();

        extract($data);

        require __DIR__ . '/../view/' . $__name . '.php';

        $out = ob_get_contents();
        ob_end_clean();

        return $out;
    }
}
