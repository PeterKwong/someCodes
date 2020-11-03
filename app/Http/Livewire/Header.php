<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Header extends Component
{	
	public $burgerOpen = false;
	public $headerSection = 0 ;

    public function render()
    {
        return view('livewire.header');
    }

    public function onClickedHeader($section){
        dd($section);
		if ($this->headerSection == $section) {
            return $this->headerSection = 0;
        }
        $this->headerSection = $section;
    } 

    public function toggleBurger()
    {   

        $this->burgerOpen = !$this->burgerOpen;

    }
}
