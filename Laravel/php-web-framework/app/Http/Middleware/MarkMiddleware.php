<?php

namespace App\Http\Middleware;

use Closure;

class MarkMiddleware
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
        if($request->get('mark') >= 33 )
        {
          return $next($request);
        }
        throw new\Exception('Your are fail.');
    }
}
