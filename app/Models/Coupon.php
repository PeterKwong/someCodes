<?php

namespace App\Models;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
	protected $fillable = ['code', 'type', 'clicked', 'user_id','account_type','account_number'];

    public function user(){
		return $this->belongsTo(User::class);    	
    }

    public function customers(){
    	return $this->hasMany(Customer::class);
    }
}
