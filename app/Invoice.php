<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;

class Invoice extends Model
{

    use FilterPaginateOrder;

    protected $hidden = array('');

	protected $fillable = [
        'customer_id','order_id', 'title', 'notes','date', 'due_date', 'discount','extra',
        'sub_total', 'total', 'deposit','balance','notes', 'invoice_no','draft_no','deposit_method','balance_method',
        'account_balance','account_total'
    ];

    protected $filter = [
        'id', 'customer_id','order_id', 'title', 'notes', 'date', 'due_date', 'discount','extra',
        'sub_total','deposit','balance', 'total', 'created_at', 'invoice_no','draft_no','deposit_method','balance_method',
        'customer.name', 'customer.phone' , 
        'invoiceDiamonds.certificate', 'engagementRings.stock', 'weddingRings.stock', 'jewelleries.stock'
    ];

	public function customer()
    {
    	return $this->belongsTo(Customer::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function invoiceDiamonds(){
    	return $this->hasMany(InvoiceDiamond::class);
    }
    public function invoiceItems(){
        return $this->hasMany(InvoiceItem::class);
    }
    public function jewelleries(){
        return $this->belongsToMany(Jewellery::class);
    }

    public function engagementRings(){
        return $this->belongsToMany(EngagementRing::class);
    }

    public function weddingRings(){
        return $this->belongsToMany(WeddingRing::class);
    }

    public function invoicePosts()
    {
        return $this->hasMany(InvoicePost::class);
    }

    public static function form()
    {
    	return [
    	'customer_id' => 'select',
    	'title' => '',
    	'date' => date('Y-m-d'),
    	'discount' => 0,
        'extra' => 0,
        'invoice_no' => 0,
        'draft_no' => 0,
        'sub_total' => 0,
        'account_sub_total' => 0,
        'deposit' => 0,
        'deposit_method' => 'cash',
        'balance' => 0,
        'balance_method' => 'cash',
        'notes'=> 'Ring Size:#',
    	'total'=> 0,
        'account_balance' => 0,
        'account_total' => 0,
        'invoice_diamonds' =>[],
        // 'inv_diamonds' =>[ InvoiceDiamond::form()],
        'engagement_rings' => [],
        'wedding_rings' => [],
        'jewelleries' => []
    	];
    }
}

