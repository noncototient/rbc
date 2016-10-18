<?php

namespace App\Http\Controllers;

use App\Item;
use App\Customer;

use App\Http\Requests;
use Illuminate\Http\Request;

class ApiSearchController extends Controller
{
    // Search for a customer
    public function searchCustomer(Request $request){

        // Retrieve phone number
        $phone = $request->get('phone');

        // Search for customer with provided phone number
        $customer = Customer::where('phone', $phone)->first();

        $success = ['success' => 'Customer found. Confirm their details below to continue.', 'customer' => $customer];

        $error = ['error' => 'Sorry, no customer found with provided phone number. Please fill in their details to continue.'];

        // Return results
        return $customer ? $success : $error;

    }

    public function searchItems(Request $request){

        $name = $request->get('item');

        $items = Item::where('name', 'LIKE', '%' . $name . '%')->get();

        return $items;

    }
}
