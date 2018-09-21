<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SourceMessage extends Model
{
    protected $table = 'sourcemessages';

    public function localization(){
        return $this->morphOne('App\Translate', 'localizable');
    }

    public function getLocalize($language, $field){
        return $this->localization()->where(['language' => $language, 'id' => $field])->firstOrFail()->translation;
    }
}
