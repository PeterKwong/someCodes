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
    public $companyInfo;

    protected $rules = [
        'companyInfo.*.key' => '',
        'companyInfo.*.value' => '',
    ];

    public function mount(){
    	 
    	$this->get();

    }
    public function setCache(){

        $cacheItems = array_merge($this->sales, $this->purchase);
        // dd($cacheItems);

        foreach ($cacheItems as $key => $item) {

            cache()->rememberForever($key, function()use($key){ 
                                    return CompanyInfo::where('key',$key)->first()->value ;
                                });
        }

    }
    public function get(){

            $this->companyInfo =  CompanyInfo::all() ;
    	// dd($this->companyInfo);
    	// return $this->sales;
    }

    public function save(){
    	
    	$this->validate();

    	foreach ($this->companyInfo as $key => $info) {
    		$info->save();
    	}
        $this->setCache();

    }
    public function render()
    {
        return view('livewire.company-info.index');
    }
}
