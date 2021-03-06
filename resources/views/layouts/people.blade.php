<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <title>Inventory Keeper</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <link href="{{ asset('css/people_layout.css') }}" rel="stylesheet">
    @yield('css')
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
                    <a class="mr-2 text-light btn btn-sm btn-dark" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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
            @yield('options')
        </ul>
    </div>
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="{{ asset('js/people_layout.js') }}" ></script>

    @yield('js')

</body>

</html>