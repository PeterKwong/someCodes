<?php

namespace App\View\Components\WeddingRing;

use Illuminate\View\Component;

class ShowDetails extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $weddingRings;
    public $tags;

    public function __construct($weddingRings,$tags)
    {
        $this->weddingRings = $weddingRings;
        $this->tags = $tags;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.wedding-ring.show-details');
    }
}
