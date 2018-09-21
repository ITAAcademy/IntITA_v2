<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $table = 'carousel';

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
