<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{
    protected $table = 'translate';

    public function localizable()
    {
        return $this->morphTo();
    }
}
