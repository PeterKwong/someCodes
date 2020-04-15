<?php

namespace App;

use Illuminate\Support\Carbon;
use App\Support\StoreUpdateDestroy;
use App\Support\FilterPaginateOrder;
use Illuminate\Database\Eloquent\Model;

class InvPost extends Model
{
    use FilterPaginateOrder, StoreUpdateDestroy;
    
    protected $hidden = array('');

    protected $fillable = [
        'invoice_id','video','texts','images','date','published','postable_id','postable_type'
    ];

    protected $filter =[
        'id','texts','images','video','published',
    ];
   
    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
    
    public function pages(){
        return $this->morphMany('App\Page', 'paginable');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function videos()
    {
        return $this->morphMany('App\Video', 'videoable');
    }

    public function texts()
    {
        return $this->morphMany('App\Text', 'textable');
    }

    public function postable(){
        return $this->morphTo('');
    }

    public static function form()
    {
        return [
            'invoice_id'=>'',
            'video' => '',
            'published' => '0',
            'postable_id' => 0,
            'postable_type' => 0,
            'date' => Carbon::now()->toDateString(),
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
