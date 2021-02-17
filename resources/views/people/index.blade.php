@extends('layouts.people')
@section('options')
<li><a href="{{ url('/people') }}"><i class="lni lni-dashboard"></i><span>Dashboard</span></a></li>
<li><a href="{{ url('/people/orders') }}"><i class="lni lni-forward"></i><span>Orders</span></a></li>
<li><a href="{{ url('/people/products') }}"><i class="lni lni-producthunt"></i><span>Products</span></a></li>
@endsection
@section('content')
<!-- Content -->
<div class="main">
    <div class="">
         <div class="bs-callout bs-callout-danger">

            <h4><i class="lni lni-home"></i> Welcome {{ Auth::user()->name }}</h4>
                Manage Your Inventory
        </div>

        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="lni lni-star"></i>
                        </div>
                        <div class="mr-5">{{ $products }} Products</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{ url('/people/products') }}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="lni lni-arrow-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                          <i class="lni lni-creative-commons"></i>
                        </div>
                        <div class="mr-5">{{ $placed_orders }} New Orders</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{ url('/people/orders') }}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="lni lni-arrow-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                          <i class="lni lni-cloud"></i>
                        </div>
                        <div class="mr-5">{{ $recieved_orders }} Recieved Orders</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{ url('/people/orders') }}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="lni lni-arrow-right"></i>
                        </span>
                    </a>
                </div>
            </div>

        </div>
       

    </div>
</div>

@endsection