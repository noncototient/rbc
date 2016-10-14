<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OrdersController extends Controller
{
	// Display all orders
	public function index(){
		return view('pages.orders.index');
	}

	// Create a new order
	public function create(){
		return view('pages.orders.create');
	}
}
