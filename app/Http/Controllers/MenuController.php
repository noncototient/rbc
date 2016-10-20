<?php

namespace App\Http\Controllers;

use App\Item;

use Session;
use App\Http\Requests;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
    	$items = Item::all();
    	return view('pages.menu.index', compact('items'));
    }

    public function showCreate(){
    	return view('pages.menu.create');
    }

    public function store(Request $request){
    	$item = Item::create($request->all());
    	Session::flash('success', 'Item successfully added.');
    	return back();
    }

    public function showEdit($id){
    	$item = Item::where('id', $id)->first();
    	return view('pages.menu.edit', compact('item'));
    }

    public function update($id, Request $request){
    	$item = Item::where('id', $id)->first();

    	$item->update($request->all());

    	Session::flash('success', 'Item successfully updated.');
    	return back();
    }
}
