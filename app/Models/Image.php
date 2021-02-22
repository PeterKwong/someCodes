<?php

namespace App\Models;

use App\Http\Support\StoreUpdateDestroy;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	use StoreUpdateDestroy;

	protected $fillable = [ 'image', 'alt', 'title','type','imageable_type'
	];

	protected $filter = ['imageable_type'];

    public function imageable()
    {
        return $this->morphTo('');
    }
}
