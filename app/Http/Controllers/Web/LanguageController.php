<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Config;
use Redirect;
use Session;

class LanguageController extends Controller
{
    public function __invoke($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('app-locale', $lang);
        }
        return Redirect::back();
    }
}
