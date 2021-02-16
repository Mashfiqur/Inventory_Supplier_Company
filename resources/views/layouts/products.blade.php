<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}" />

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <link href="{{ asset('css/people_layout.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
    <style>
        .bg-light {
            background-color: #eae9e9 !important;
        }
    </style>
</head>

<body>
    <div class="header">
        <a href="#" id="menu-action">
            <i class="lni lni-list"></i>
            <span>Close</span>
        </a>
        <div class="logo">
            <div class="row">
                <div class="col-6">
                    @if(Auth::user()->is_supplier == 1)
                    <i class="lni lni-home"></i> Supplier Panel
                    @else
                    <i class="lni lni-home"></i> Company Panel
                    @endif
                </div>
                <div class="col-6 text-right">
                    <a class="mr-2 text-light btn btn-sm btn-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="sidebar">
        <ul>
            <li><a href="{{ url('/people') }}"><i class="lni lni-dashboard"></i><span>Dashboard</span></a></li>
            <li><a href="{{ url('/people/orders') }}"><i class="lni lni-forward"></i><span>Orders</span></a></li>
            <li><a href="{{ url('/people/products/{any?}') }}"><i class="lni lni-producthunt"></i><span>Products</span></a></li>
        </ul>
    </div>
    <div id="product_entry_app">
   
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="{{ asset('js/people_layout.js') }}" ></script>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>

</html>