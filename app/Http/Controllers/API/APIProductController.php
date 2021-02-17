<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    
    
    public function index()
    {
        // $products = Product::where('company_id',Auth::user()->company_id)->get()->toArray();
        $products = Product::all()->toArray();

        return array_reverse($products);
    }
    public function list()
    {
        dd("HI");
        $products = Product::where('company_id',Auth::user()->company_id)->get()->toArray();

        return array_reverse($products);
    }
    // add post
    public function add(Request $request)
    {
        $product = new Product([
            'sku' => $request->input('sku'),
            'company_id' => Auth::user()->company_id,
        ]);
        $product->save();
 
        return response()->json('The product successfully added');
    }
 
    // edit post
    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }
 
    // update post
    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->update($request->all());
 
        return response()->json('The product successfully updated');
    }
 
    // delete post
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
 
        return response()->json('The product successfully deleted');
    }
}
