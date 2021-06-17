<?php

namespace App\Http\Livewire\CustomerJewellery;

use App\Models\InvoicePost;
use App\Models\WeddingRingPair;
use Illuminate\Session\SessionManager;
use Livewire\Component;

class Show extends Component
{	
	public $meta;
	public $diamondUrl;
    public $videoSelecting;
    public $tags;
    public $posts;

    public function render()
    {	
    	// dd($this->meta);

        return view('livewire.customer-jewellery.show');
    }

    public function mount(){

        $title =  (new InvoicePost)->title(request()->segment(3)) ;

        $this->meta = InvoicePost::with([
                        // 'texts'=>function($texts){
                        //     $texts->where('locale',app()->getLocale());
                        // },
                        'images',
                        'invoice.invoiceDiamonds',
                        'invoice.engagementRings.images',
                        'invoice.weddingRings.weddingRingPair.images',
                        'invoice.jewelleries.images',
                        // 'invoice.invoicePosts.images',
                    ])->findOrFail(request()->segment(3));

        $this->weightRange();

        $this->meta->invoice->title = $title;

        $this->setVideo();
        // dd($this->meta);
        // dd($this->meta->video360);

        // dd( $this->meta->invoice->weddingRings->count());

        // $types = ['engagementRings','weddingRings','jewelleries'];

        // foreach ($types as $key => $type) {
        //     if($this->meta->invoice->{$type}->count()){
        //         $this->{$type.'Posts'}();
        //         // dd($type);
        //     }
        // }

        // dd( $this->tags );
    }
    public function weddingRingsPosts()
    {   
        // dd( $this->meta->invoice->weddingRings);
        $weddingRingPairs = WeddingRingPair::with(['weddingRings','images','weddingRings.texts'])
                            ->findOrFail($this->meta->invoice->weddingRings[0]->WeddingRingPair->id);

        $posts = InvoicePost::where('published',1)
                            ->where('postable_type','App\Models\WeddingRing')
                            ->wherein('postable_id',$this->meta->invoice->weddingRings->pluck('id'))
                            ->with([
                                'images',
                                ])->orderBy('created_at','desc')->get();

        $invoicePosts = [];
        foreach ($posts as $key => $post ) {
                $post['texts']['content'] = $post->title($post->id);
                $invoicePosts['invoicePosts'][] = $post;
        }

        $this->posts['weddingRings'] = $invoicePosts;
        $this->posts['weddingRings']['model'] = $weddingRingPairs;

        foreach ($this->meta->invoice->weddingRings as $key => $tag) {
                // dd($tag);
                $this->tags['weddingRings'] = $tag->tags();
        }
    }
    public function setVideo()
    {
        $this->meta->video360?$this->videoSelecting = 'video360':'video';
    }
    public function weightRange(){
        
        foreach ($this->meta->invoice->invoiceDiamonds as $diamondWeight) {

            $weights = [
                        [ 'value' =>0, 'url' => ''],
                        [ 'value' =>0.3, 'url' => '/0-30-0-49-carat-weight'],
                        [ 'value' =>0.5, 'url' => '/0-50-0-79-carat-weight'],
                        [ 'value' =>0.8, 'url' => '/0-80-0-99-carat-weight'],
                        [ 'value' =>1, 'url' => '/1-00-1-19-carat-weight'],
                        [ 'value' =>1.2, 'url' => '/1-20-1-49-carat-weight'],
                        [ 'value' =>1.5, 'url' => '/1-50-1-99-carat-weight'],
                        [ 'value' =>2, 'url' => '/2-00-2-99-carat-weight'],
                        [ 'value' =>3, 'url' => '/3-00-up-carat-weight'],
                        ];

            $diamondRange =null;

            foreach ($weights as $w => $weight) {
            // dd(floatval($diamond->weight));
                if ( floatval($diamondWeight->weight) >= $weight['value']) {
                    $diamondRange = $weight['url'];
                        // dd($diamondRange);
                }
            }
            $this->diamondUrl[] = $diamondRange;
                        // dd($this->diamondUrl);

        }
    } 
}
