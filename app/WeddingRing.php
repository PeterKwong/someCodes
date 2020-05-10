<?php

namespace App;

use App\Support\WeddingRingFilter;
use Illuminate\Database\Eloquent\Model;

class WeddingRing extends Model
{
    use WeddingRingFilter;

	    protected $hidden = array('pivot');
	    
		protected $fillable =[
		'id','stock' ,'texts' ,'style','images','sideStone','gender','customized','published', 'video','unit_price',
		'metal','metal_weight','ct','cost','brand',
		];

	    protected $filter = [
	    'id','stock' ,'texts' ,'metal','style','images','sideStone', 'ct', 'gender','customized', 'published','video','unit_price',
	    ];
		
	    public function invoices(){
	    	return $this->belongsToMany(Invoice::class);
	    }
	    public function pages()
	    {
	    return $this->morphMany('App\Page', 'paginable');
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
	        return $this->morphMany('App\InvoicePost', 'postable');
	    }
	    
	    public function weddingRingPair()
	    {
    		return $this->belongsToMany(WeddingRingPair::class);
    	}


	    public static function form()
	    	{
	    		return [ 
	    		[
	    		'gender'=> 'm',
	    		'stock' => '' , 
	    		'texts' => '' , 
	    		'unit_price' => '0',
	            'metal'=> '18KW',
	            'style' => 'Classic',
	            'ct'=> '0',
	            'customized'=> '0',
	            'sideStone' =>'0',
	            'images' => [['image'=>'',
								'type' => 'cover'],
							['image'=>'',
								'type' => 'cover'],
							['image'=>'',
								'type' => 'cover']] ,  
				'texts' => [
		            ['content'=> '', 'locale'=>'en', 'type'=>'title'], 
		            ['content'=> '', 'locale'=>'hk', 'type'=>'title'], 
		            ['content'=> '', 'locale'=>'cn', 'type'=>'title'], 
		                ],
	            'video'=> '',
	            'published'=> '0',
	        ],
	            
	            [
	            'gender'=> 'f',
	    		'stock' => '' , 
	    		'texts' => '' , 
	    		'unit_price' => '0',
	            'metal'=> '18KW',
	            'style' => 'Classic',
	            'ct'=> '0',
	            'customized'=> '0',
	            'sideStone' =>'0',
	            'images' => [['image'=>'',
								'type' => 'cover'],
							['image'=>'',
								'type' => 'cover'],
							['image'=>'',
								'type' => 'cover']] ,  
				'texts' => [
		            ['content'=> '', 'locale'=>'en', 'type'=>'title'], 
		            ['content'=> '', 'locale'=>'hk', 'type'=>'title'], 
		            ['content'=> '', 'locale'=>'cn', 'type'=>'title'], 
		                ],
	            'video'=> '',
	            'published'=> '0',
	        ],

	        ];
	    	}
}
