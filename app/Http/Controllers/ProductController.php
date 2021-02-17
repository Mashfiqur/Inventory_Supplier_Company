<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    
    
    public function index()
    {
        $products = Product::where('company_id',Auth::user()->company_id)->get()->toArray();
        return view('people.products',compact('products'));
    }
   
    // add product
    public function create(Request $request)
    {
        $product = new Product([
            'sku' => $request->sku,
            'company_id' => Auth::user()->company_id,
        ]);
        $product->save();
 
        return back();
    }
 
   
 
    // update product
    public function update( Request $request)
    {
        $product = Product::find($request->id);
        $product->sku = $request->sku;
        $product->update();
 
        return back()->with('The product successfully updated');
    }
 
    // delete product
    public function destroy(Request $request)
    { 
        $product = Product::where('id',$request->id)->delete();
 
        return back()->with('The product successfully deleted');
    }
}
