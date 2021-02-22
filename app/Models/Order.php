<?php

namespace App\Models;

use App\Models\Customer;
use App\Http\Support\FilterPaginateOrder;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use FilterPaginateOrder;

	protected $fillable = [
        'customer_id', 'title', 'notes','date', 'due_date', 'discount','extra',
        'sub_total', 'total', 'deposit','balance','notes', 'count', 'invoice_no','deposit_method','balance_method','finalize_code','coupon_code','verified','status', 'customer_stripe'
    	];


    protected $filter = [
        'id', 'customer_id', 'title', 'notes', 'date', 'due_date', 'discount','extra',
        'sub_total','deposit','balance', 'total', 'created_at', 'invoice_no','deposit_method','balance_method',
        'customer.name', 
            'customer.phone'
    ];

    protected $hidden = [
                        // 'customer_stripe',
                        'finalize_code'
                    ];

    public function cartItems(){
    	
    	return $this->hasMany(CartItem::class);
    }

    public function customer(){
    	
    	return $this->belongsTo(Customer::class);
    }

    public function invoice(){
        
        return $this->belongsTo(Invoice::class);
    }
}
