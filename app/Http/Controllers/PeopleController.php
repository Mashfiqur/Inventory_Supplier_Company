<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeopleController extends Controller
{
    public function index(){
        $products = Product::where('company_id', Auth::user()->company_id)->count();
        $placed_orders = Shipment::where('company_id', Auth::user()->company_id)->whereNull('dispatched_at')->count();
        $recieved_orders = Shipment::where('company_id', Auth::user()->company_id)->whereNotNull('dispatched_at')->count();
        return view('people.index', compact('products', 'placed_orders', 'recieved_orders'));
    }

   
}
