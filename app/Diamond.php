<?php

namespace App;

use App\Support\DataViewer;
use App\Support\DiamondExtraFunctions;
use App\Support\FilterPaginateOrder;
use Illuminate\Database\Eloquent\Model;

class Diamond extends Model
{
    use DataViewer, DiamondExtraFunctions;

    protected $hidden = array('supplier_id','image_link','r_id','cert_link');

    protected $guarded = [];

 //    protected $fillable = [
	// 'id', 'price', 'stock', 'certificate', 'shape', 'weight', 'color', 'clarity', 'cut', 'polish', 'symmetry', 'fluorescence', 'lab', 'location', 'has_image','image_link','has_cert', 'video_link', 'available'
	// ];

    protected $filter = [
        'id', 'price', 'stock', 'certificate', 'shape', 'weight', 'color', 'clarity', 'cut', 'polish', 'symmetry', 'fluorescence', 'lab', 'location', 'has_image','image_link','has_cert', 'video_link', 'available'
                ];

   	 public static $columns = [
    	       'id',
                'price',
                'shape',
                'weight',
                'color',
                'clarity',
                'cut',
                'polish',
                'symmetry',
                'fluorescence',
                'certificate',
                'lab',
                'stock',
                'location',
                'has_image'];


    	public function supplier()
    	{
    		return $this->belongsTo(Supplier::class);
    	}

    	public static function form()
    	{
    		return [
    		'id' => '' , 
    		'price' => 0 , 
    		'stock' => '' , 
    		'certificate' => 0, 
    		'shape' => '', 
    		'weight' => 0, 
    		'color' => '', 
    		'clarity' => '', 
    		'cut' => '', 
    		'polish' => '', 
    		'symmetry' => '', 
    		'fluorescence' => '', 
    		'lab' => '', 
    		'location' => '', 
    		'has_image'
    		];
    	}
}
