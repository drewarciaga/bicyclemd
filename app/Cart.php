<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = [
		'receipt_id',
		'item_id',
	];

    public function items(){
    	return $this->hasMany('App\Item');
    }

    public function transaction(){
    	return $this->belongsTo('App\Transaction');
    }
}
