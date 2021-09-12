<?php

namespace App\Http\Livewire;

use App\Models\EngagementRing;
use App\Models\InvoicePost;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;

class Carousel extends Component
{
    use WithPagination;

    public $type;
    public $typeId;
    public $jsData;
    public $selectingItem = [];
    public $mount =false;
    public $jsPosts;
    // public $invoiceDiamond =[];

    protected $model;

    public function render()
    {
        return view('livewire.carousel',
                    ['posts' =>$this->{$this->type}(), 
                    // 'model'=>$this->model
                    ]);
    }
    public function engagementRing()
    {
        // $this->model = EngagementRing::where('published',1)->with(['images','texts'])->findOrFail($this->typeId);

        // $this->mount?'':$this->setType();

        $querySize = isset($_COOKIE['screenX'])&&$_COOKIE['screenX']<640?3:4;
        // dd($querySize);
        $posts = InvoicePost::where('published',1)
                            ->where('postable_type','App\Models\EngagementRing')
                            ->where('postable_id',$this->typeId)
                            ->with([
                                'images',
                                'invoice.invoiceDiamonds',
                                'invoice.engagementRings',
                                'invoice.weddingRings',
                                'invoice.jewelleries',
                                ])->orderBy('created_at','desc')->paginate($querySize);

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
        // dd($post);
        $this->selectingItem['id'] =$id;
        $this->selectingItem['invoice_diamonds'] =$diamond;
        $this->selectingItem['engagement_rings'] =$engagementRing;
        $this->selectingItem['wedding_rings'] =$weddingRings;
        $this->selectingItem['jewelleries'] =$jewelleries;

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
