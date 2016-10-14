<?php

namespace App\Http\Controllers;

use App\Customer;

use App\Http\Requests;
use Illuminate\Http\Request;

class ApiSearchController extends Controller
{
    // Search for a customer
    public function searchCustomer(Request $request){
    	// Declare error message
    	$customerNotFoundMessage = ['error' => 'Customer with this phone number does not exist. Please fill in their details or try a different phone number.'];

    	// Check if phone number was sent
    	if(!$request->has('q')){
    		// Display generic error
    		return 'You should just give up and quit and never start this again.';
    	}

    	// Retrieve the phone number
    	$phone = $request->get('q');

    	// Search for a customer with this phone number
    	$customerDetails = Customer::where('phone', $phone)->first();

    	$customer = ['customer' => $customerDetails, 'success' => 'Customer found. Please confirm their details and click continue.'];

    	// Return customer if found, or error otherwise
    	return $customerDetails ? $customer : $customerNotFoundMessage;
    	
    }
}
