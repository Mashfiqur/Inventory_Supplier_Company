<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function index(){
        $open_orders = Shipment::where('supplier_id', Auth::user()->id)->whereNull('dispatched_at')->count();
        $closed_orders = Shipment::where('supplier_id', Auth::user()->id)->whereNotNull('dispatched_at')->count();

        return view('supplier.index', compact('open_orders', 'closed_orders'));
    }

    public function open_orders(){

        $open_orders = Shipment::where('supplier_id', Auth::user()->id)->whereNull('dispatched_at')->get();
        return view('supplier.open_orders', compact('open_orders'));

    }

    public function closed_orders(){
        $closed_orders = Shipment::where('supplier_id', Auth::user()->id)->whereNotNull('dispatched_at')->get();

        return view('supplier.closed_orders',compact('closed_orders'));
        
    }
}
