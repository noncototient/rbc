<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
   	// ------------------------------------------
	// Initial setup
	// ------------------------------------------
    protected $fillable = [
    	'name', 
    	'description',
    	'price'
	];
    protected $dates = ['created_at', 'updated_at'];


    // ------------------------------------------
    // Relationships
    // ------------------------------------------
    public function order(){
    	return $this->belongsToMany('App\Order');
    }
}
