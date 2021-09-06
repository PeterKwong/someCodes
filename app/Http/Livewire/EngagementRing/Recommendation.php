<?php

namespace App\Http\Livewire\EngagementRing;

use App\Models\EngagementRing;
use DB;
use Livewire\Component;

class Recommendation extends Component
{
    public function render()
    {   
        $this->randomQuery();

        return view('livewire.engagement-ring.recommendation',['model' => $this->randomQuery()]);
    }
    public function randomQuery()
    {
        return EngagementRing::inRandomOrder()
                ->with(['images'])
                ->paginate(4);

        // dd($this->model);
    }
}
