<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
	protected $fillable = [
	'r_id', 'name', 'country', 
	];

	public function diamonds(){
		return $this->hasMany(Diamond::class);
	}
}
