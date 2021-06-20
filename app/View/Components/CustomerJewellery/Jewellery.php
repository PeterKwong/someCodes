<?php

namespace App\View\Components\CustomerJewellery;

use Illuminate\View\Component;

class Jewellery extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $jewelleries;
    public $tags;

    public function __construct($jewelleries,$tags)
    {
        $this->jewelleries = $jewelleries->jewelleries->where('type','!=','Misc')->first();
        $this->tags = $tags;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.customer-jewellery.jewellery');
    }
}
