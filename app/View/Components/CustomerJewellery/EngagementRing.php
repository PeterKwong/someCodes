<?php

namespace App\View\Components\CustomerJewellery;

use Illuminate\View\Component;

class EngagementRing extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $engagementRings;
    public $tags;

    public function __construct($engagementRings,$tags)
    {
        $this->engagementRings = $engagementRings->engagementRings->first();
        $this->tags = $tags;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.customer-jewellery.engagement-ring');
    }
}
