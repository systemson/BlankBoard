<?php

namespace App;

use Illuminate\Support\Facades\Route as BaseRoute;

class Route extends BaseRoute
{
    public static function resource($name, $controller, array $options = [])
    {
        self::get($name . '/register', $controller . '@registerResourceAction')->name($name . '.register');
        return parent::resource($name, $controller, $options);
    }
}
