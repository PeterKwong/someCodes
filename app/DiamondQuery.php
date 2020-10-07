<?php

namespace App;

use App\Support\DiamondFilter;
use App\Support\DiamondExtraFunctions;
use App\Support\FilterPaginateOrder;
use Illuminate\Database\Eloquent\Model;

class DiamondQuery extends Model
{
    use DiamondFilter, DiamondExtraFunctions;

    protected $hidden = array('supplier_id','image_link','r_id','cert_link');

    public $incrementing = false;
    
    protected $guarded = [];

    protected $filter = [
        'id', 'price', 'stock', 'certificate', 'shape', 'weight', 'color', 'clarity', 'cut', 'polish', 'symmetry', 'fluorescence', 'lab', 'location', 'has_image', 'heart_image', 'arrow_image', 'asset_image', 'image_link','has_cert', 'video_link', 'available','supplier_id','starred' , 'milky', 'brown', 'green', 'length', 'width', 'depth','eye_clean', 'fancy_color', 'fancy_intensity','fancy_overtone'
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
                'starred',
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
