<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Request;


class Helper
{
    public static function checkURLIfAdmin()
    {
        return Request::path() == 'admin/login' ? true : false;
    }
}
