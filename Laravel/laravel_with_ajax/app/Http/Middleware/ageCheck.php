<?php

namespace App\Http\Middleware;

use Closure;
use Age;

class ageCheck
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
        $age = $request->age;
 
        if( $age < 20 )
        {
            return redirect()->to('/');
        }
        return $next($request);
    }
}



