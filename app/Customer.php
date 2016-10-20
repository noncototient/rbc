<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	// ------------------------------------------
	// Initial setup
	// ------------------------------------------
    protected $hidden = ['id'];
    protected $fillable = [
    	'first_name', 
    	'last_name', 
    	'phone', 
    	'email', 
    	'card_number', 
    	'exp_date',
    	'cvc',
    	'street',
    	'suburb',
    	'city',
    	'zip'
	];
    protected $dates = ['created_at', 'updated_at'];

    // ------------------------------------------
    // Getters and setters
    // ------------------------------------------
    public function getNameAttribute(){
        return $this->first_name . ' ' . $this->last_name;
    }

    // ------------------------------------------
    // Relationships
    // ------------------------------------------
    public function orders(){
    	return $this->belongsToMany('App\Order');
    }
}
