<?php

namespace App;
use App\Support\FilterPaginateOrder;
use App\Support\StoreUpdateDestroy;

use Illuminate\Database\Eloquent\Model;

class CustomerMoment extends Model
{
    use FilterPaginateOrder,StoreUpdateDestroy;

    protected $fillable = [
        'id','texts','images','published'
    ];

    protected $filter =[
        'id','images','video','published',
    ];

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function texts()
    {
        return $this->morphMany('App\Text', 'textable');
    }

   	public static function form()
	{
		return [
        'published' => '0',
        'images' => [['image'=>'',
                        'type' => 'cover']] , 
        'texts' => [
                ['content'=> '', 'locale'=>'en', 'type'=>'title'], 
                ['content'=> '', 'locale'=>'hk', 'type'=>'title'],                     
                ['content'=> '', 'locale'=>'cn', 'type'=>'title'], 
                    ],
            ];
	}
}
