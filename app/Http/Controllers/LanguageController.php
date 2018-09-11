<?php

namespace App\Http\Middleware;

namespace App\Http\Controllers;

use App\Http\Requests;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        Session::put('locale', $lang);
        return Redirect::back();
    }
}