<?php

namespace App\Models;

use App\Http\Support\StoreUpdateDestroy;
use App\Http\Support\EngagementRingFilter;
use Illuminate\Database\Eloquent\Model;

class EngagementRing extends Model
{
	use EngagementRingFilter, StoreUpdateDestroy;

	    protected $hidden = array('pivot');
	    
		protected $fillable =[
		'id','stock' ,'texts','prong','shoulder','style','shape','images','video','customized','other','published','unit_price',
		'metal','metal_weight','ct','cost','brand','video360',
		];

	    protected $filter = [
	    'id','stock' ,'texts','prong','shoulder','style','shape','ct','images','video','customized','other','published','unit_price',
	    ];
					
		public function pages()
	    {
	        return $this->morphMany('App\Models\Page', 'paginable');
	    }
    
	    public function invoices(){
	    	return $this->belongsToMany(Invoice::class);
	    }

	    public function invoiceItems(){
	    	return $this->morphMany('App\Models\InvoiceItem','invoice_itemable');
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
	    
		//Title
	    public function title(){

	    	return $this->generateTitle(' ');
	    			
	    }
	    public function tags(){

	    	return $this->generateTitle(', ');
	    			
	    }
	    public function generateTitle($separator){

	    	$title = trans('engagementRing.' .$this->style) 
	    			. $separator . trans('engagementRing.' .$this->prong)
	    			. $separator . trans('engagementRing.' .$this->shoulder) 
	    			;
	    	$title .= $this->other ?  $separator . trans('engagementRing.' .$this->other):'' ;
	    	$title .= $separator . trans('engagementRing.Diamond Ring')
	    			. '｜'. trans('engagementRing.Engagement Ring Setting');

	    	return $title;
	    	
	    }

	    public static function form()
	    	{
	    		return [
	    		'unit_price' => '0',
	            'prong'=> '4-prong',
	            'shoulder'=> 'Tapering',
	            'style' => 'Solitaire',
	            'shape' => 'round',
	            'other'=> '',
	            'customized' => 0,
	            'published'=> 0,
	            'metal'=> '18KW',
	            'metal_weight' => 0,
	            'ct' => 0,
	            'cost' => 0,
	            'brand'=> '',
	            'video'=> '',
	            'video360'=> [],
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
