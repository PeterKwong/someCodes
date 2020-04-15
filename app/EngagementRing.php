<?php

namespace App;

use App\Support\StoreUpdateDestroy;
use App\Support\EngagementRingFilter;
use Illuminate\Database\Eloquent\Model;

class EngagementRing extends Model
{
	use EngagementRingFilter, StoreUpdateDestroy;

	    protected $hidden = array('pivot');
	    
		protected $fillable =[
		'id','stock' ,'texts','prong','shoulder','style','ct','images','video','customized','published','unit_price',
		];

	    protected $filter = [
	    'id','stock' ,'texts','prong','shoulder','style','ct','images','video','customized','published','unit_price',
	    ];
					
		public function pages()
	    {
	        return $this->morphMany('App\Page', 'paginable');
	    }
    
	    public function invoices(){
	    	return $this->belongsToMany(Invoice::class);
	    }

	    public function images()
	    {
	        return $this->morphMany('App\Image', 'imageable');
	    }

	    public function videos()
	    {
	        return $this->morphMany('App\Video', 'videoable');
	    }

	    public function texts()
	    {
	        return $this->morphMany('App\Text', 'textable');
	    }

	    public function posts()
	    {
	        return $this->morphMany('App\InvPost', 'postable');
	    }

	    public static function form()
	    	{
	    		return [
	    		'unit_price' => '0',
	            'prong'=> '4-prong',
	            'shoulder'=> 'Tapering',
	            'style' => 'Solitaire',
	            'customized' => '0',
	            'published'=> '0',
	            'ct' => '0',
	            'video'=> '',
				'images' => [['image'=>'',
								'type' => 'cover'],] , 
				'texts' => [
		            ['content'=> '', 'locale'=>'en', 'type'=>'title'], 
		            ['content'=> '', 'locale'=>'hk', 'type'=>'title'], 
		            ['content'=> '', 'locale'=>'cn', 'type'=>'title'], 
		                ],


            		];
	    	}
}
