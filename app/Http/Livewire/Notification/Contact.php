<?php

namespace App\Http\Livewire\Notification;

use App\Models\CompanyInfo;
use Livewire\Component;

class Contact extends Component
{	
	public $companyInfo;

    public function render()
    {
        return view('livewire.notification.contact');
    }
    public function mount(){

    	$this->checkCompanyInfo();

    }
    public function checkCompanyInfo(){

    	$info = cache()->remember('homePageShow', 10, function(){ return CompanyInfo::where('key','homePageShow')->first()->value  ;});
    	// dd($info->value);
    	if ( $info ) {
    		$this->companyInfo = CompanyInfo::where('key','homePage')->first()->value;
    	}
    }
}
