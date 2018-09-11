<?php

namespace App\Helpers\Translate;

use Illuminate\Support\Facades\DB;
use Session;
use Config;

class Translate
{
    /**
     * @param string $category $number $language
     * @param string $number
     * @param string $language
     *
     * @return string
     */
    public static function value($category = '', $number, $language = null)
    {
        $language = $language ? $language : Session::get('locale', Config::get('app.locale'));
        $translate = DB::table('translate')->where(['language' => $language, 'id' => $number])->first();
        return (isset($translate->translation) ? $translate->translation : 'Not found');
    }

    /**
     * @param string $name
     *
     * @return string
     */
    public static function localeImage($name)
    {
        $session_locale = Session::get('locale', Config::get('app.locale'));
        $locale_name = $session_locale ? $session_locale : 'ua';
        return $locale_name.'_'.$name;
    }
}