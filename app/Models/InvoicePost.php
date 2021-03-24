<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use App\Http\Support\StoreUpdateDestroy;
use App\Http\Support\FilterPaginateOrder;
use Illuminate\Database\Eloquent\Model;

class InvoicePost extends Model
{
    use FilterPaginateOrder, StoreUpdateDestroy;
    
    protected $hidden = array('');

    protected $fillable = [
        'invoice_id','video','texts','images','date','published','postable_id','postable_type','video360',
    ];

    protected $filter =[
        'id','texts.content','images','video','published','invoice_id'
    ];
   
    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
    
    public function page(){
        return $this->morphOne('App\Models\Page', 'paginable');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function videos()
    {
        return $this->morphMany('App\Models\Video', 'videoable');
    }

    public function texts()
    {
        return $this->morphMany('App\Models\Text', 'textable');
    }

    public function postable(){
        return $this->morphTo('');
    }

    public function title($id){

        $data = $this;
        $title = '';
        $data = $data->with(['invoice.invoiceDiamonds',
                    'invoice.engagementRings',
                    'invoice.weddingRings',
                    'invoice.jewelleries',
                    ])->find($id);
        
        $types = ['invoiceDiamonds', 'engagementRings', 'weddingRings' ,'jewelleries'];

        foreach ($types as $key => $type) {
            // dd($data);
            if (count( $data->invoice->{$type}) && $type != 'jewelleries') {
                    $title .=  $title ? ' | ' :''; 
                    $title .= $data->invoice->{$type}->first()->title();
            }else{
                if ( count( $data->invoice->{$type}) && $data->invoice->{$type}->first()->type != 'Misc') {
                    $title .=  $title ? ' | ' :''; 
                    $title .= $data->invoice->{$type}->first()->title();                        
                }
            }
        }

        // dd($data);
        $data->invoice->title = $title;

        return $title;
                    
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
            'page' => ['tags'=>[]],
        ];
    }
}
