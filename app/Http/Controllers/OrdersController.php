<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use App\Customer;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
	// Display all orders
	public function index(){
		// Fetch all orders to display on the page
		$orders = Order::orderBy('created_at', 'DESC')->get(); // all orders

		$totalDelivery = Order::where('type', 'delivery')->count(); // count of orders that are delivery |  This is for 
		$totalTakeaway = Order::where('type', 'takeaway')->count(); // count orders that are takeaway    |  the donut graph

		// Count total takings of orders for today
		$todayTotal = Order::where('created_at', '>', Carbon::now()->startOfDay())->sum('amount');
		// Count total amount of orders for today
		$todayOrderscount = Order::where('created_at', '>', Carbon::now()->startOfDay())->count(); 

		// Return the main with data
		return view('pages.orders.index', compact('orders', 'totalDelivery', 'totalTakeaway', 'todayTotal', 'todayOrderscount'));
	}

	// Create a new order
	public function create(){
		// Show page to create an order (the rest is handled by JS)
		return view('pages.orders.create');
	}

	// Method that accepts ajax request with all the order details:
	// * Order items
	// * Customer details
	// * Order type
	// * Order total
	public function processOrder(Request $request){
		// Retrieve initial values
		$data = $request->get('data');
		$customerData = $data['customer'];
		$orderData = $data['order'];

		$orderTotal = $data['total'];
		$orderType = $data['type'];

		// Find Customer or create if does not exist
		$customer = Customer::firstOrCreate($customerData);

		// Create an order
		$order = Order::create(['amount' => $orderTotal, 'type' => $orderType]);

		// Associate customer with the order
		$customer->orders()->attach($order);

		// Retrieve items
		$items = [];
		foreach($orderData as $index => $item){ 
			array_push($items, $item['item']['id']);
		}

		// Associate items with the order
		$order->items()->attach($items);

	}
}
