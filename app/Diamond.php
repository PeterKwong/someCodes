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
	// 'id', 'price', 'stock', 'certificate', 'shape', 'weight', 'color', 'clarity', 'cut', 'polish', 'symmetry', 'fluorescence', 'lab', 'location', 'has_image','image_link','has_cert', 'video_link', 'available','star'
	// ];

    protected $filter = [
        'id', 'price', 'stock', 'certificate', 'shape', 'weight', 'color', 'clarity', 'cut', 'polish', 'symmetry', 'fluorescence', 'lab', 'location', 'has_image','image_link','has_cert', 'video_link', 'available','supplier_id','starred'
                ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H-i-s',
        'updated_at' => 'datetime:Y-m-d H-i-s',
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
    		'stock' => 'TD-' , 
    		'certificate' => 0, 
    		'shape' => 'ROUND', 
    		'weight' => 0, 
    		'color' => 'D', 
    		'clarity' => 'SI2', 
    		'cut' => 'EX', 
    		'polish' => 'EX', 
    		'symmetry' => 'EX', 
    		'fluorescence' => 'NON', 
    		'lab' => 'GIA', 
            'location' => '1Hong Kong', 
            'available' => 1, 
            'supplier_id' => 166, 
            'has_cert' => 1, 
            'cert_link' => '', 
            'starred' => now()->toDateTimeString(), 
    		];
    	}
}
