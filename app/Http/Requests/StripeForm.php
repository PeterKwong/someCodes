<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Stripe\{Stripe, Customer, Charge};
use App\Models\Order;

class StripeForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    private $key = '';

    public function authorize()
    {
        // dd($this->user);
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function setApiKey(){
        return  Stripe::setApiKey( config('global.stripe.secret' . config('global.paymentMode') ));

    }
    
    public function rules()
    {
        return [
            // 'stripeEmail' => 'required | email',
            // 'stripeToken' => 'required',
        ];
    }

    public function save($charge, $stripeToken, $email){

        $this->setApiKey();

        // dd('hi');
        $stripeCustomer = Customer::create([

            'email' => $email,
            'source' => $stripeToken,

        ]);

         return $stripeCustomer->id;


        // Charge::create([
        //     'customer' => $stripeCustomer->id,
        //     'amount' => $charge * 100,
        //     'currency' => 'hkd',
        // ]);            



    }

    public function charge($order){

        $this->setApiKey();

        // dd($order['customer_stripe']);
        
        Charge::create([
            'customer' => $order['customer_stripe'],
            'amount' => $order->deposit * 100,
            'currency' => 'hkd',
        ]);   

        $order->update(['status' => 'received money']);

        return 'done';

    }
}
