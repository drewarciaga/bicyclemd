<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
		'name',
		'brand',
		'model',
		'size',
		'color',
		'type',
		'price',
		'stock',
		'barcode',
		'delete_flag',
	];

    public function transaction(){
    	return $this->belongsTo('App\Transaction');
    }
}
