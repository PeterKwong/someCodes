<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;

class Flash extends Component
{	
	public $flash;
	protected $listeners = ['notifiication-flash' => 'getMessage'];

    public function render()
    {
        return view('livewire.notification.flash');
    }
    public function getMessage($message){

        $this->flash['show'] =  true ;
        $this->flash['type'] =  explode(',', $message)[0];
        $this->flash['title'] =  explode(',', $message)[1];
        $this->flash['messages'][] =  explode(',', $message)[2];

    }

}
