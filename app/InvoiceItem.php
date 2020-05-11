<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $guarded = [];

    public function invoiceItemable(){
    	return $this->morphTo('');
    }
    public function invoices(){
    	return $this->belongsTo(Invoice::class);
    }
}
