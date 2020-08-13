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
        'id', 'price', 'stock', 'certificate', 'shape', 'weight', 'color', 'clarity', 'cut', 'polish', 'symmetry', 'fluorescence', 'lab', 'location', 'has_image', 'heart_image', 'arrow_image', 'asset_image', 'image_link','has_cert', 'video_link', 'available','supplier_id','starred' , 'milky', 'brown', 'green', 'length', 'width', 'depth'
                ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

   	 public static $columns = [
                'has_image',
                'shape',
                'price',
                'weight',
                'color',
                'clarity',
                'cut',
                'polish',
                'symmetry',
                'fluorescence',
                'location',
                'certificate',
                'lab',
                'starred',
                'table_percent',
                'depth_percent',
                'crown_angle',
                'parvilion_angle',
                'length',
                'width',
                'depth',
            ];


    	public function supplier()
    	{
    		return $this->belongsTo(Supplier::class);
    	}

    	public static function form()
    	{
    		return [
    		'id' => '' , 
    		'price' => 0 , 
    		'stock' => 'S166-G' , 
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

        public function turnHiddenToEmpty(){
            $this->hidden = [];
            return $this;
        }
}
