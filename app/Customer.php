<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class Customer extends Model
{
    use FilterPaginateOrder;
    
   	protected $fillable = [
	'name', 'phone','email', 'address','user_id', 'country','stripe_id','stripe_active','wechat',
	];

	protected $filter = [
    	'id', 'email', 'name', 'phone', 'address', 'country','user_id', 'created_at','wechat'
    ];

    public function invoices()
    {
    	return $this->hasMany(Invoice::class);
    }

    public static function form()
    {
    	return [
    	'name' => '',
        'phone' => '',
        'wechat' => '',
    	'email' => '' 
    	];
    }

    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
