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

        // if customer is found, return an array with data
        $success = ['success' => 'Customer found. Confirm their details below to continue.', 'customer' => $customer];

        // if customer is not found, return an array with data
        $error = ['error' => 'Sorry, no customer found with provided phone number. Please fill in their details to continue.'];

        // Return results
        return $customer ? $success : $error;

    }

    public function searchItems(Request $request){

        // Fetch the name of the item being searched
        $name = $request->get('item');

        // Search item in db
        $items = Item::where('name', 'LIKE', '%' . $name . '%')->get();

        // Return with data to view
        return $items;

    }
}
