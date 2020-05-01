<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;


class InvDiamond extends Model
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

    	public static function form()
    	{
    		return [
    		// 'id' => '' , 
            'price' => 0 , 
            'account_price' => 0 , 
    		'stock' => '' , 
    		'certificate' => '', 
    		'shape' => 'RD', 
    		'weight' => '', 
    		'color' => '', 
    		'clarity' => '', 
    		'cut' => 'EX', 
    		'polish' => 'EX', 
    		'symmetry' => 'EX', 
    		'fluorescence' => 'NON', 
    		'lab' => 'GIA'
    		];
    	}
}
