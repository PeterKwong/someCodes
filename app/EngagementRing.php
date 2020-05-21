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
		'id','stock' ,'texts','prong','shoulder','style','images','video','customized','published','unit_price',
		'metal','metal_weight','ct','cost','brand',
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

	    public function invoiceItems(){
	    	return $this->morphMany('App\InvoiceItem','invoice_itemable');
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


	    public static function form()
	    	{
	    		return [
	    		'unit_price' => '0',
	            'prong'=> '4-prong',
	            'shoulder'=> 'Tapering',
	            'style' => 'Solitaire',
	            'customized' => 0,
	            'published'=> 0,
	            'metal'=> '18KW',
	            'metal_weight' => 0,
	            'ct' => 0,
	            'cost' => 0,
	            'brand'=> '',
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
