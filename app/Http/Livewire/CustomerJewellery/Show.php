<?php

namespace App\Http\Livewire\CustomerJewellery;

use App\Models\InvoicePost;
use Illuminate\Session\SessionManager;
use Livewire\Component;

class Show extends Component
{	
	public $meta;
	public $diamondUrl;

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

        // dd($this->meta);

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
