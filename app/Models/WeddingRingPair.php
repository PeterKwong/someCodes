<?php

namespace App\Models;

use App\Http\Support\StoreUpdateDestroy;
use App\Http\Support\WeddingRingFilter;
use App\Models\WeddingRing;
use Illuminate\Database\Eloquent\Model;

class WeddingRingPair extends Model
{
	use WeddingRingFilter, StoreUpdateDestroy;
	
	protected $fillable =[
	'id','texts' ,'images', 
    'published', 'video', 'video360', 
	];
	
    public function weddingRings(){
    	return $this->hasMany(WeddingRing::class);
    }

    public function pages()
    {
        return $this->morphMany('App\Models\Page', 'paginable');
    }

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function videos()
    {
        return $this->morphMany('App\Models\Video', 'videoable');
    }

    public function texts()
    {
        return $this->morphMany('App\Models\Text', 'textable');
    }

    public function posts()
    {
        return $this->morphMany('App\Models\InvoicePost', 'postable');
    }

    public static function form()
    {
        return [
            'published' => 0,
            'video' => '',
            'video360'=> [],
            'images' => [['image'=>'',
                            'type' => 'cover'],
                        ] , 
            'weddingRings' => WeddingRing::form()
        ];
    }
}
