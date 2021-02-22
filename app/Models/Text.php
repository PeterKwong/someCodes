<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{

	protected $fillable = [
	'locale', 'content', 'type', 'textable_type'
	];


    public function textable()
    {
        return $this->morphTo('');
    }
}
