<?php

namespace App\Http\Livewire\Cache;

use Livewire\Component;

class Cache extends Component
{	
	public $cache = [
						'googleCommentRate' => '',
                        'googleCommentCount' => '',
                        'homePage' => '',
                        'homePageShow' => '',
					];

    public function render()
    {	

        return view('livewire.cache.cache' );
    }

    public function mount(){
    	 
    	$this->get();

    }
    public function get(){

    	foreach ($this->cache as $key => $value) {

    		$this->cache[$key] =  cache()->get($key) ;

    	}
    	// dd($this->cache);
    	return $this->cache;
    }

    public function save(){

    	foreach ($this->cache as $key => $value) {

    		cache()->put($key, $value); 

    	}
    }

}
