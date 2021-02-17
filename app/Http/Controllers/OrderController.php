<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Package;
use Carbon\Carbon;

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
        $suppliers = User::where('is_supplier',1)->get();
        return view('people.shipment_create',compact('products','suppliers'));
    }

    public function store(Request $request){
        $shipment = new Shipment();
        $shipment->company_id = Auth::user()->company_id;
        $shipment->name = $request->name;
        $shipment->supplier_id = $request->supplier;
        $shipment->is_dispatch = 0;
        $shipment->save();

        $products = json_decode($request->ItemArray);

        $data = [];
        foreach($products as $product){
            array_push($data,['product_id' => $product->item, 'shipment_id' =>  1,'quantity'=>$product->quantity,'created_at'=>Carbon::Now()]);
        }

        Package::insert($data);

        return redirect(url('/people/orders'))->with('Order has been created successfully!');

    }

}
