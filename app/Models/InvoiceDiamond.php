<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Support\FilterPaginateOrder;


class InvoiceDiamond extends Model
{
    
    use FilterPaginateOrder;

    protected $fillable = [
	'id', 'price','account_price', 'stock', 'certificate', 'shape', 'weight', 'color', 'clarity', 'cut', 'polish', 'symmetry', 'fluorescence', 'lab','due_date'
	];
   	 protected $filter = [
    	'id', 'price', 'stock', 'certificate', 'shape', 'weight', 'color', 'clarity', 'cut', 'polish', 'symmetry', 'fluorescence', 'lab','due_date'
    			];


	public function invoice()
	{
		return $this->belongsTo(Invoice::class);
	}

    public function title(){

        return cache()->remember('invoiceDiamond.' . app()->getLocale() . '.'.$this->id, 36000, function(){

	        $title = $this->weight . trans('diamondSearch.carat') 
	                . ' '. $this->color . trans('diamondSearch.color') 
	                . ' '. $this->clarity . trans('diamondSearch.clarity') 
	                . ' '. $this->cut . trans('diamondSearch.cut') 
	                . ' '. $this->polish . trans('diamondSearch.polish') 
	                . ' '. $this->symmetry . trans('diamondSearch.symmetry') 
	                . ' '. $this->fluorescence . trans('diamondSearch.fluorescence') 
	                . ' '. trans('diamondSearch.diamond')
	                ;

	        return $title;
	    });
                
    }

	public static function form()
	{
		return [
		// 'id' => '' , 
        'price' => 0 , 
        'account_price' => 0 , 
		'stock' => '' , 
		'certificate' => '', 
		'shape' => 'RD', 
		'weight' => 1, 
		'color' => 'D', 
		'clarity' => 'SI2', 
		'cut' => 'EX', 
		'polish' => 'EX', 
		'symmetry' => 'EX', 
		'fluorescence' => 'NON', 
		'lab' => 'GIA'
		];
	}
}
