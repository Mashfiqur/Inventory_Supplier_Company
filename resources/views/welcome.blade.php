<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <title>Inventory Keeper</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <link href="{{ asset('css/people_layout.css') }}" rel="stylesheet">
    @yield('css')
</head>

<div class="container">

    <body class="antialiased">
    <div class="container p-5 mt-5">
    <h1>Inventory Management System</h1>
    </div>
        <div class="text-center relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                @if(Auth::user()->is_supplier == 1)
                <a href="{{ url('/supplier') }}" class="btn btn-sm btn-primary text-sm text-gray-700 underline">Home</a>
                @else
                <a href="{{ url('/people') }}" class="btn btn-sm btn-primary text-sm text-gray-700 underline">Home</a>
                @endif

                @else
                <a href="{{ route('login') }}" class="btn btn-sm btn-secondary text-sm text-gray-700 underline">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-sm btn-dark ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
                @endauth
            </div>
            @endif


        </div>
</div>
</body>

</html>