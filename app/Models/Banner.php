<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    const PUBLISHED = 1;

    public function scopeActive($query)
    {
        return $query->orderBy('slide_position', 'asc')->where('visible', self::PUBLISHED);
    }
}
