<?php

namespace App\Http\Livewire\Notification;

use App\Models\CompanyInfo;
use Livewire\Component;

class Contact extends Component
{	
	public $companyInfo;

    public function render()
    {
    	if(cache()->get('homePageShow') == 1)
        {
            session()->put('notification', cache()->get('homePage') );
        }

        return view('livewire.notification.contact');
    }

}
