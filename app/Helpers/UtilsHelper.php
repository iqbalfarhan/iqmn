<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class UtilsHelper
{
    public static function randomCode()
    {
        $code = implode("", [
            Str::upper(Str::random(3)),
            rand(100, 999),
        ]);

        return str_shuffle($code);
    }
}
