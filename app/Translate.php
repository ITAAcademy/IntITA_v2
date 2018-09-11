<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{
    protected $table = 'translate';

    public function localizable()
    {
        return $this->morphTo();
    }
}
