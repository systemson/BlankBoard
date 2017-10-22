<?php

namespace App;

use Illuminate\Support\Facades\Auth as BaseAuth;

class Auth extends BaseAuth
{

    /**
     * Display user's full name.
     *
     * @return string
     */
    public static function name()
    {

        if(self::user()->last_name != null) {
            return self::user()->name . ' ' . self::user()->last_name;
        } else {
            return self::user()->name;
        }
    }

    /**
     * Display user's image.
     *
     * @return string
     */
    public static function image()
    {

        if(self::user()->image != null) {
            return self::user()->image;
        } else {
            return 'img/avatar/default.png';
        }
    }
}
