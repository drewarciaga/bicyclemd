<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
		'item_id',
		'quantity',
		'txn_code',
		'discount_rate',
		'user_id',
		'status',
		'amount',
		'discounted_amount'
    ];
    public function item(){
    	return $this->hasOne('App\Item', 'id', 'item_id');
    }
}
