<?php

namespace App\Http\Livewire\EngagementRing;

use App\Models\EngagementRing;
use Livewire\WithPagination;
use Livewire\Component;

class Recommendation extends Component
{
    use WithPagination;

    public $showModal = false;
    public $modelId;

    public function render()
    {   
        // dd($this->randomQuery());

        return view('livewire.engagement-ring.recommendation',['model' => $this->randomQuery(),'modal'=>$this->modelId?$this->fetchModal():'']);
    }
    public function randomQuery()
    {
        return EngagementRing::where('published',1)
                ->inRandomOrder()
                ->with(['images'])
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
        return EngagementRing::whereId($this->modelId)->with(['images'])->first();
    }

}
