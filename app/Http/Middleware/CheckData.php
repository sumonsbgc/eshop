<?php

namespace App\Http\Middleware;

use Closure;

class CheckData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session('return_data') != null){

            return $next($request);
        }else{
            return redirect('/cartpage');
        }
    }
}
