<?php

namespace App\Models;

use App\Http\Support\StoreUpdateDestroy;
use App\Http\Support\JewelleryFilter;
use Illuminate\Database\Eloquent\Model;

class Jewellery extends Model
{

    use JewelleryFilter, StoreUpdateDestroy;

    protected $hidden = array('pivot');
    
	protected $fillable =[
	'id','stock' ,'texts' ,'type','gemstone' ,'setting','sideStone','images','video','published','unit_price',
    'metal','metal_weight','ct','cost','brand','video360',

	];

    protected $filter = [
    'id','stock' ,'texts' ,'metal' ,'type','gemstone' ,'setting','sideStone','ct','images','video','published','unit_price',
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
        
    //Title
    public function title(){

        return $this->generateTitle(' ');
                
    }
    public function tags(){

        return $this->generateTitle(', ');
                
    }
    public function generateTitle($separator){

        $title = trans('jewellery.' .$this->metal);

        $title .=  $this->gemstone == 0 ?  '' : $separator .trans('jewellery.' .$this->gemstone);
        $title .=  $separator . trans('jewellery.' .$this->type);
        $title .=  $this->setting == 1 ? $separator .trans('jewellery.setting'): '';

        return $title;
                
    }


    public static function form()
    	{
    		return [
            'stock' => '' ,
            'type' => 'Accessory' ,
            'metal'=> '18KW',
            'gemstone'=> 0,
            'ct'=> 0,
            'cost'=> 0,
            'setting' => 0,
            'sideStone' => 0,
            'video360'=> [],
            'images' => [['image'=>'',
                                'type' => 'cover'],] , 
            'video'=> '',
            'published'=> '0',
            'customized' => '0',
            'unit_price' => '',
            'texts' => [
                    ['content'=> '', 'locale'=>'en', 'type'=>'title'], 
                    ['content'=> '', 'locale'=>'hk', 'type'=>'title'], 
                    ['content'=> '', 'locale'=>'cn', 'type'=>'title'], 
                        ],

                		];
    	}
}
