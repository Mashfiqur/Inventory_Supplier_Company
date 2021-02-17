<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Shipment::where('company_id',Auth::user()->company_id)->get()->toArray();
        $products = Product::where('company_id',Auth::user()->company_id)->get()->toArray();

        return view('people.shipment',compact('products','orders'));
    }

    public function new(){
        $products = Product::where('company_id',Auth::user()->company_id)->get()->toArray();

        return view('people.shipment_create',compact('products'));
    }

}
