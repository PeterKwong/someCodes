<?php

namespace App\Http\Livewire\ShoppingCart;

use App\Models\Diamond;
use App\Models\EngagementRing;
use Livewire\Component;

class Review extends Component
{
    public $diamondId;
    public $engagementRingId;


    public function render()
    {   
        // dd($this->diamond);

        // dd(isset($_COOKIE['shoppingCartDiam'])?$_COOKIE['shoppingCartDiam']:0);
        // if ($this->diamond >0) {
        // $this->queryDiamonds();
        // }
        return view('livewire.shopping-cart.review',[
                        'diamond'=>$this->diamondId>0?$this->queryDiamond():null,
                        'engagementRing'=>$this->engagementRingId>0?$this->queryEngagementRing():null,
                        ]);
    }
    public function queryDiamond()
    {   
        // dd($this->diamond);
        return Diamond::where('id',$this->diamondId)->first();
    }
    public function queryEngagementRing()
    {   
        // dd($this->EngagementRing);
        return EngagementRing::where('id',$this->engagementRingId)->with('images')->first();
    }
}
