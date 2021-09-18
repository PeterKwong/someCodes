<?php

namespace App\Http\Livewire\WeddingRing;

use App\Models\WeddingRingPair;
use Livewire\Component;
use Livewire\WithPagination;

class Recommendation extends Component
{
    use WithPagination;

    public $showModal = false;
    public $modelId;

    public function render()
    {
        return view('livewire.wedding-ring.recommendation',['model' => $this->randomQuery(),'modal'=>$this->modelId?$this->fetchModal():'']);
    }

    public function randomQuery()
    {
        return WeddingRingPair::where('published',1)
                ->inRandomOrder()
                ->with(['images',
                        'weddingRings',
                        'weddingRings'=> function($query){ $query->withCount('invoices');},
                    ])
                ->paginate(4);

        // dd($this->model);
    }
    public function modalModel($id)
    {  
        // $this->showModal = true;
        $this->modelId = $id;
    }
    public function fetchModal()
    {
        return WeddingRingPair::whereId($this->modelId)->with(['images'])->first();
    }

}
