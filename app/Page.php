<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

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
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
