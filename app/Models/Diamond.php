<?php

namespace App\Models;

use App\Http\Support\DiamondFilter;
use App\Http\Support\DiamondExtraFunctions;
use App\Http\Support\FilterPaginateOrder;
use Illuminate\Database\Eloquent\Model;

class Diamond extends Model
{
    use DiamondFilter, DiamondExtraFunctions;

    protected $hidden = array('supplier_id','image_link','r_id','cert_link');

    protected $guarded = [];

 //    protected $fillable = [
	// 'id', 'price', 'stock', 'certificate', 'shape', 'weight', 'color', 'clarity', 'cut', 'polish', 'symmetry', 'fluorescence', 'lab', 'location', 'has_image','image_link','has_cert', 'video_link', 'available','star'
	// ];

    protected $filter = [
        'id', 'price', 'stock', 'certificate', 'shape', 'weight', 'color', 'clarity', 'cut', 'polish', 'symmetry', 'fluorescence', 'lab', 'location', 'has_image', 'heart_image', 'arrow_image', 'asset_image', 'image_link','has_cert', 'video_link', 'available','supplier_id','starred' , 'milky', 'brown', 'green', 'length', 'width', 'depth','eye_clean', 'fancy_color', 'fancy_intensity','fancy_overtone'
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

        public function title(){

            return $this->generateTitle(' ');
                    
        }
        public function tags(){

            return $this->generateTitle(', ');
                    
        }
        public function generateTitle($separator){

            $separatorConcate = '';
            if ($separator == ', ') {
                $separatorConcate = 'comma';
            }

            return cache()->remember($separatorConcate .'diamondTitle.' . app()->getLocale() . '.'.$this->id, config('global.cache.week'), function()use($separator){

                $title = $this->weight . trans('diamondSearch.carat') 
                        . $separator . $this->color  .' '.  trans('diamondSearch.color') 
                        . $separator . $this->clarity  .' '.  trans('diamondSearch.clarity') 
                        . $separator . $this->cut  .' '.  trans('diamondSearch.cut') 
                        . $separator . $this->polish  .' '.  trans('diamondSearch.polish') 
                        . $separator . $this->symmetry  .' '.  trans('diamondSearch.symmetry') 
                        . $separator . $this->fluorescence  .' '.  trans('diamondSearch.fluorescence') 
                        . $separator . trans('diamondSearch.diamond')
                        ;
                        
                return $title;
            });
            
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
