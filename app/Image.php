<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = [ 'image', 'alt', 'title','type'
	];

	protected $filter = ['imageable_type'];

    public function imageable()
    {
        return $this->morphTo('');
    }
}
