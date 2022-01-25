<?php

namespace App\Http\Middleware\Frontend;

use Closure;
use Auth;
use Session;


class CustomerLoginCheckMiddleware
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

        if (!Session::get('customar_id')){

            return redirect('/customar');
            

        }else{
            return $next($request);

        }
        
    }
}
