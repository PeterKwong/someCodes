<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function videoable()
    {
        return $this->morphTo('');
    }
}