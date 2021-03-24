<?php

namespace App\Models;

use App\Http\Support\WeddingRingFilter;
use Illuminate\Database\Eloquent\Model;

class WeddingRing extends Model
{
    use WeddingRingFilter;

	    protected $hidden = array('pivot');
	    
		protected $fillable =[
		'id','stock' ,'texts' ,'shape','finish','metal','brand','style','origin','images','sideStone','gender','customized','published', 'video','unit_price','metal_weight','ct','cost','brand','video360',
		];

	    protected $filter = [
	    'id','stock' ,'texts' ,'metal','style','images','sideStone', 'ct', 'gender','customized', 'published','video','unit_price',
	    ];
		
	    public function invoices(){
	    	return $this->belongsToMany(Invoice::class);
	    }
	    public function invoiceItems(){
	    	return $this->morphMany('App\Models\InvoiceItem','invoice_itemable');
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
	    
	    public function weddingRingPair()
	    {
    		return $this->belongsToMany(WeddingRingPair::class);
    	}
        public function title(){

            return $this->generateTitle(' ');
                    
        }
        public function tags(){

            return $this->generateTitle(', ');
                    
        }
        public function generateTitle($separator){

	    	$title  = $this->brand ? '('.trans('weddingRing.' .$this->brand) .')'. $separator :'' ;
	    	$title .= trans('weddingRing.' .$this->metal) 
	    			. $separator . trans('weddingRing.' .$this->shape) 
	    			. $separator . trans('weddingRing.' .$this->finish)
	    			;
	    	$title .= $this->style ? $separator . trans('weddingRing.' .$this->style) :'' ;
	    	$title .= $separator . trans('weddingRing.Wedding Rings');
	    	$title .= '｜' . trans('weddingRing.Couple Rings');

	    	return $title;
	    			
	    }

	    public static function form()
	    	{
	    		return [ 
	    		[
	    		'gender'=> 'm',
	    		'stock' => '' , 
	    		'texts' => '' , 
	    		'unit_price' => 0,
	            'shape'=> 'straight',
	            'finish'=> 'high polish',
	            'metal'=> '18KW',
	    		'metal_weight' => 0,
	            'origin'=> 'local',
	            'brand'=> '',
	            'style' => '',
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
	    		'unit_price' => 0,
	            'metal'=> '18KW',
	            'shape'=> 'straight',
	            'finish'=> 'high polish',
	            'metal'=> '18KW',
	    		'metal_weight' => 0,
	            'origin'=> 'local',
	            'brand'=> '',
	            'style' => '',
	            'ct'=> 0,
	            'cost' => 0,
	            'customized'=> 0,
	            'sideStone' =>0,
	            'published'=> 0,
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
	        ],

	        ];
	    	}
}
