<?php

namespace App\Http\Livewire\CompanyInfo;

use App\Models\CompanyInfo;
use Livewire\Component;

class Index extends Component
{
		public $sales = [
						'googleCommentRate' => '',
                        'googleCommentCount' => '',
                        'homePage' => '',
                        'homePageShow' => '',
					];

    public $purchase = [
                        'goldPrice18K' => 0,
                        'goldPricePT' => 0,
                        'priceFactor' => 1.9,
                ]; 


    public function mount(){
    	 
    	$this->get();

    }
    public function get(){

    	foreach ($this->sales as $key => $value) {

    		$this->sales[$key] =  CompanyInfo::whereKey($key)->first() ;

    	}

        foreach ($this->purchase as $key => $value) {

            $this->purchase[$key] =  CompanyInfo::whereKey($key)->first() ;

        }
    	// dd($this->sales);
    	// return $this->sales;
    }

    public function save(){

    	foreach ($this->sales as $key => $value) {

    		CompanyInfo::where($key, $value)->save(); 

    	}

        foreach ($this->purchase as $key => $value) {

            CompanyInfo::where($key, $value)->save(); 

        }

    }
    public function render()
    {
        return view('livewire.company-info.index');
    }
}
