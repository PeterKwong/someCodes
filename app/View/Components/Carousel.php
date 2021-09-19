<?php

namespace App\View\Components;

use App\Models\EngagementRing;
use App\Models\InvoicePost;
use App\Models\Jewellery;
use App\Models\WeddingRingPair;
use Illuminate\View\Component;

class Carousel extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $typeId;
    public $jsData;
    public $selectingItem;
    public $mount =false;

    protected $model;

    public function __construct($type,$typeId)
    {
        $this->type = $type;
        $this->typeId = $typeId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $this->{$this->type}();
        return view('components.carousel',['model'=>$this->model]);
    }
    public function engagementRing()
    {
        $this->model = EngagementRing::where('published',1)->with(['images','texts'])->findOrFail($this->typeId);

        $this->mount?'':$this->setType();

        // return $posts = InvoicePost::where('published',1)
        //                     ->where('postable_type','App\Models\EngagementRing')
        //                     ->where('postable_id',$this->typeId)
        //                     ->with([
        //                         'images',
        //                         'invoice.invoiceDiamonds'
        //                         ])->orderBy('created_at','desc')->paginate(4);

    }
    public function weddingRing()
    {
        $this->model = WeddingRingPair::where('published',1)->with(['images','texts'])->findOrFail($this->typeId);

        $this->mount?'':$this->setType();

        // return $posts = InvoicePost::where('published',1)
        //                     ->where('postable_type','App\Models\EngagementRing')
        //                     ->where('postable_id',$this->typeId)
        //                     ->with([
        //                         'images',
        //                         'invoice.invoiceDiamonds'
        //                         ])->orderBy('created_at','desc')->paginate(4);

    }
    public function jewellery()
    {
        $this->model = Jewellery::where('published',1)->with(['images','texts'])->findOrFail($this->typeId);

        $this->mount?'':$this->setType();

        // return $posts = InvoicePost::where('published',1)
        //                     ->where('postable_type','App\Models\Jewellery')
        //                     ->where('postable_id',$this->typeId)
        //                     ->with([
        //                         'images',
        //                         'invoice.invoiceDiamonds'
        //                         ])->orderBy('created_at','desc')->paginate(4);

    }
    public function setType(){
        $types = ['video360','video','images'];
        foreach ($types as $key => $value) {
            if ($this->model->{$value} ) {
                $this->setInitJsData($value);
                return $this->mount = true;
            }
        }
    }
    public function setInitJsData($type){
        // dd($type);
        // $url = config('global.cache.' . config('global.cache.live') ) . 'public/';

        $data = ['src'=>'',
                    'thumb'=>'',
                    'type'=> $type,
                    'video360' => false,

                ];

        if ($type == 'video360') {
            $data['thumb'] =  $this->model->video360 ;
            $data['src'] =  $this->model->video;
            $data['video360'] = $this->model->video360;
        }

        if ($type == 'video') {
            $data['thumb'] = $this->model->images->first()->image;
            $data['src'] =  $this->model->video;
        }

        if ($type == 'image') {
            $data['src'] =  $this->model->images->first()->image;
        }

        $this->jsData = $data;
    }
    // public function directBack()
    // {
    //     // return redirect(url()->current());

    //    // return back();
    // }
    // public function ne()
    // {
        
    // }
    // public function setJsData($type,$src,$thumb='',$video360=false){
    //     // dd('done');
    //     $url = config('global.cache.' . config('global.cache.live') ) . 'public/';
    //     $data = ['src'=>$url,
    //                 'thumb'=>$url,
    //                 'type'=>$type,
    //                 'video360' => false,

    //             ];

    //     if ($type == 'image') {
    //         $data['src'] .= 'images/'. $src;
    //     }

    //     $this->jsData = $data;

    // }
}
