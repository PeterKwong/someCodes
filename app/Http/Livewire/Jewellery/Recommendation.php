<?php

namespace App\Http\Livewire\Jewellery;

use App\Models\Jewellery;
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

        return view('livewire.jewellery.recommendation',['model' => $this->randomQuery(),'modal'=>$this->modelId?$this->fetchModal():'']);
    }
    public function randomQuery()
    {
        return Jewellery::where('published',1)
                ->inRandomOrder()
                ->with(['images'])
                ->withCount('invoices')
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
        return Jewellery::whereId($this->modelId)->with(['images'])->first();
    }

}
