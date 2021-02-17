<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        return view('supplier.index');
    }

    public function open_orders(){
        return view('supplier.open_orders');

    }

    public function closed_orders(){
        return view('supplier.closed_orders');
        
    }
}
