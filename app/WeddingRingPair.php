<?php

namespace App;

use App\Support\WeddingRingFilter;
use App\Support\StoreUpdateDestroy;
use Illuminate\Database\Eloquent\Model;

class WeddingRingPair extends Model
{
	use WeddingRingFilter, StoreUpdateDestroy;
	
	protected $fillable =[
	'id','stock' ,'texts' ,'metal','style','images','sideStone', 'ct', 'gender','customized','published', 'video','unit_price',
	];
	
    public function weddingRings(){
    	return $this->hasMany(WeddingRing::class);
    }

     public function pages()
    {
        return $this->morphMany('App\Page', 'paginable');
    }
}
