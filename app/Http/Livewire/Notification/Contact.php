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

}
