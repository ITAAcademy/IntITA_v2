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

    /**
     *
     * @return array
     */
    public static function validationMsg()
    {

        return [
            'required' => self::value('error', '0268'),
            'email' => self::value('error', '0271'),
            'confirmed' => self::value('error', '0269'),
            'unique' => self::value('error', '0272'),
            'auth' => self::value('error', '0272'),
            'name' => self::value('error', '0416'),
        ];
    }
}