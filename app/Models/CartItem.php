<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['cart_itemable_id', 'cart_itemable_type', 'user_id', 'title', 'unit_price', 'image', 'ring_size', 'engrave', 'pair_item_id'];


    public function cartItemable(){
    	
    	return $this->morphTo('');
    }

    public function order(){
    	return $this->belongsTo(Order::class);
    }

}
