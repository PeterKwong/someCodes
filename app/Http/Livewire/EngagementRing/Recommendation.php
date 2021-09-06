<?php

namespace App\Http\Livewire\EngagementRing;

use App\Models\EngagementRing;
use Livewire\WithPagination;
use Livewire\Component;

class Recommendation extends Component
{
    use WithPagination;

    public function render()
    {   
        $this->randomQuery();

        return view('livewire.engagement-ring.recommendation',['model' => $this->randomQuery()]);
    }
    public function randomQuery()
    {
        return EngagementRing::where('published',1)
                ->inRandomOrder()
                ->with(['images'])
                ->paginate(4);

        // dd($this->model);
    }
}
