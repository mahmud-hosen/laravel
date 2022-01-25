<?php

namespace App\Http\Middleware\Frontend;

use Closure;
use Auth;
use Session;

class ShippingIdCheckMiddleware
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
        if (!Session::get('shipping_id')){

            return redirect('/checkout/shipping');
            

        }
        return $next($request);
    }
}
