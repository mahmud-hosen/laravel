<?php

namespace App\Http\Middleware\Frontend;

use Closure;
use Auth;
use App\Cart;
class CartvalueCheckMiddleware
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

          
        $cart = Cart::all();
       
        if($cart->isEmpty()){
            
            session()->flash('sucess',' No Product in Cart');
            return redirect('/shop/view');
            

        }


        
        return $next($request);
    }
}
