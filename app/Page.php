<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function paginable()
    {
        return $this->morphTo();
    }
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function texts()
    {
        return $this->morphMany('App\Text', 'textable');
    }
}
