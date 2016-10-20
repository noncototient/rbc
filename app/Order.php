<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // ------------------------------------------
	// Initial setup
	// ------------------------------------------
    protected $hidden = ['id'];
    protected $fillable = [
    	'customer_id', 
    	'amount',
    	'type'
	];
    protected $dates = ['created_at', 'updated_at'];


    // ------------------------------------------
    // Relationships
    // ------------------------------------------
    public function customer(){
    	return $this->belongsToMany('App\Customer');
    }

    public function items(){
        return $this->belongsToMany('App\Item');
    }
}
