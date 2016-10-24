<?php

namespace App\Http\Controllers;

use App\Item;

use Session;
use App\Http\Requests;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){    
        // Fetch all menu items to show on the page
    	$items = Item::all();
    	return view('pages.menu.index', compact('items'));
    }

    public function showCreate(){
        // Show the view to create an item
    	return view('pages.menu.create');
    }

    public function store(Request $request){
        // Retrieve a currently being created menu item and store in DB
    	$item = Item::create($request->all());
        
        // Display a success message
    	Session::flash('success', 'Item successfully added.');

        // return back to the create view with success message
    	return back();
    }

    public function showEdit($id){
        // Retrieve an item being edited
    	$item = Item::where('id', $id)->first();

        // Show the view to edit selected item
    	return view('pages.menu.edit', compact('item'));
    }

    public function update($id, Request $request){
        // Find the item being edited
    	$item = Item::where('id', $id)->first();

        // Update the item being edited with new details
    	$item->update($request->all());

        // Display a success message
    	Session::flash('success', 'Item successfully updated.');

        // Return back to the view
    	return back();
    }
}
