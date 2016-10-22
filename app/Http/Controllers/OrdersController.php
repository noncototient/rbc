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
		$orders = Order::orderBy('created_at', 'DESC')->get();
		$totalDelivery = Order::where('type', 'delivery')->count();
		$totalTakeaway = Order::where('type', 'takeaway')->count();
		$todayTotal = Order::where('created_at', '>', Carbon::now()->startOfDay())->sum('amount');
		$todayOrderscount = Order::where('created_at', '>', Carbon::now()->startOfDay())->count();
		return view('pages.orders.index', compact('orders', 'totalDelivery', 'totalTakeaway', 'todayTotal', 'todayOrderscount'));
	}

	// Create a new order
	public function create(){
		return view('pages.orders.create');
	}

	public function processOrder(Request $request){
		// Retrieve initial values
		$data = $request->get('data');
		$customerData = $data['customer'];
		$orderData = $data['order'];

		$orderTotal = $data['total'];
		$orderType = $data['type'];

		// return $data;

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
