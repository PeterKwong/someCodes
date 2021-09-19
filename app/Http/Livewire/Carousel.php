<?php

namespace App\Http\Livewire;

use App\Models\EngagementRing;
use App\Models\InvoicePost;
use App\Models\WeddingRingPair;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Carousel extends Component
{
    use WithPagination;

    public $type;
    public $typeId;
    public $jsData;
    public $selectingItem = [];
    public $mount =false;
    public $jsPosts;
    public $querySize;
    // public $invoiceDiamond =[];

    protected $model;

    public function render()
    {
        return view('livewire.carousel',
                    ['posts' =>$this->{$this->type}(), 
                    // 'model'=>$this->model
                    ]);
    }
    public function mount()
    {
        $this->querySize = isset($_COOKIE['screenX'])&&$_COOKIE['screenX']<640?3:4;

    }
    public function engagementRing()
    {
        // $this->model = EngagementRing::where('published',1)->with(['images','texts'])->findOrFail($this->typeId);

        // $this->mount?'':$this->setType();

        $posts = InvoicePost::where('published',1)
                            ->where('postable_type','App\Models\EngagementRing')
                            ->where('postable_id',$this->typeId)
                            ->with([
                                'images',
                                'invoice.invoiceDiamonds',
                                'invoice.engagementRings',
                                ])->orderBy('created_at','desc')->paginate($this->querySize);

        $this->jsPosts = $posts->toArray();
        // dd($this->jsPosts);
        return $posts;

    }
    public function jewellery()
    {
        // $this->model = EngagementRing::where('published',1)->with(['images','texts'])->findOrFail($this->typeId);

        // $this->mount?'':$this->setType();

        $posts = InvoicePost::where('published',1)
                            ->where('postable_type','App\Models\Jewellery')
                            ->where('postable_id',$this->typeId)
                            ->with([
                                'images',
                                'invoice.invoiceDiamonds',
                                'invoice.jewelleries',
                                ])->orderBy('created_at','desc')->paginate($this->querySize);

        $this->jsPosts = $posts->toArray();
        // dd($this->jsPosts);
        return $posts;

    }

    public function weddingRing()
    {
        $this->model = WeddingRingPair::where('published',1)->with('weddingRings')->findOrFail($this->typeId);

        $ids = [];
        foreach ($this->model->weddingRings as $key => $ring) {
            $ids[] = $ring->id;
        }

        // dd($ids);
        // $this->mount?'':$this->setType();

        $posts = InvoicePost::where('published',1)
                            ->where('postable_type','App\Models\WeddingRing')
                            ->whereIn('postable_id',$ids)
                            ->with([
                                'images',
                                'invoice.weddingRings',
                                ])->orderBy('created_at','desc')->paginate($this->querySize);

        $this->jsPosts = $posts->toArray();
        // dd($this->jsPosts);
        return $posts;

    }
    // public function setType(){
    //     $types = ['video360','video','images'];
    //     foreach ($types as $key => $value) {
    //         if ($this->model->{$value} ) {
    //             $this->setInitJsData($value);
    //             return $this->mount = true;
    //         }
    //     }
    // }
    // public function setInitJsData($type){
    //     // dd($type);
    //     // $url = config('global.cache.' . config('global.cache.live') ) . 'public/';

    //     $data = ['src'=>'',
    //                 'thumb'=>'',
    //                 'type'=> $type,
    //                 'video360' => false,

    //             ];

    //     if ($type == 'video360') {
    //         $data['thumb'] =  $this->model->video360 ;
    //         $data['src'] =  $this->model->video;
    //         $data['video360'] = $this->model->video360;
    //     }

    //     if ($type == 'video') {
    //         $data['thumb'] = $this->model->images->first()->image;
    //         $data['src'] =  $this->model->video;
    //     }

    //     if ($type == 'image') {
    //         $data['src'] =  $this->model->images->first()->image;
    //     }

    //     $this->jsData = $data;
    // }
    // public function directBack()
    // {
    //     // return redirect(url()->current());

    //    // return back();
    // }
    public function selectingItemPost($id,$diamond,$engagementRing,$weddingRings,$jewelleries)
    {
        // dd($weddingRings);
        $this->selectingItem['id'] =$id;
        $this->selectingItem['invoice_diamonds'] =$diamond;
        $this->selectingItem['engagement_rings'] =$engagementRing;
        $this->selectingItem['wedding_rings'] =$weddingRings;
        $this->selectingItem['jewelleries'] =$jewelleries;

        // dd($this->selectingItem['wedding_rings']);

        // if ($post['invoice']['invoice_diamonds']) {
        //     $this->invoiceDiamond = $post['invoice']['invoice_diamonds'][0];
        //     // dd($this->invoiceDiamond);
        // }
        // return $this->invoiceDiamond;

    }
    public function setJsData($type,$src,$thumb='',$video360=false){
        // dd('done');
        // $url = config('global.cache.' . config('global.cache.live') ) . 'public/';

        $data = ['src'=>'',
                    'thumb'=>'',
                    'type'=> $type,
                    'video360' => false,

                ];

        if ($type == 'video360') {
            $data['thumb'] =  $thumb ;
            $data['src'] =  $src;
            $data['video360'] = $video360;
        }

        if ($type == 'video') {
            $data['thumb'] = $thumb;
            $data['src'] =  $src;
        }

        if ($type == 'image') {
            $data['src'] =  $src;
        }

        $this->jsData = $data;

    }
}
