<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class People
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $type = Auth::user()->is_supplier;

        if($type == 0){
            // Ready to go
        }
        else{
            Auth::logout(); 
            // return redirect()->route('denied');
        }
        return $next($request);
    }
}
