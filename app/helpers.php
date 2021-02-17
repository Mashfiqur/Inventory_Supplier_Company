<?php

use App\Models\Package;


function products($shipment_id){

    $products = Package::join('products','packages.product_id','products.id')->where('packages.shipment_id',$shipment_id)->select('products.sku', 'packages.quantity')->get();
    return $products;
}