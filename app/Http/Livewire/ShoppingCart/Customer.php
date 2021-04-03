<?php

namespace App\Http\Livewire\ShoppingCart;

use App\Models\Customer as ModelCustomer;
use Livewire\Component;

class Customer extends Component
{
	public $user;
	public $customer;

	protected $rules = [
        'customer.name' => 'required',
        'customer.phone' => 'required|min:8',
    ];

    public function render()
    {
        return view('livewire.shopping-cart.customer');
    }

    public function mount(){

        if (!auth()->check()) {
            return redirect(app()->getLocale() . '/shop-bag-bill');
        }
        
    	$this->user =auth()->user();

    	$this->customer =auth()->user()->customers;

    	if ( !count($this->customer) ) {

    		$this->customer = new ModelCustomer();
    		$this->customer = $this->customer->form();
    		$this->customer['email'] = $this->user->email;
    		$this->customer['user_id'] = $this->user->id;

    	}else{

	    	$this->customer = $this->customer->first()->toArray();
	    	// dd($this->customer);
    	}
    }

    public function save(){

    	$this->validate();

    	$customer = auth()->user()->customers;

    	if ( !count($customer) ) {
    		$customer = ModelCustomer::create($this->customer);
    	}else{
    		$customer = $customer->first();
    		$customer->update($this->customer);

    	}

		redirect(app()->getLocale() . '/shop-bag-bill');
		
    }

}
