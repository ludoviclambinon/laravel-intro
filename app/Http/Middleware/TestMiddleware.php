<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddleware
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
        if(now()->Format('s') % 2) 
        {
            return $next($request);
        }
        return response('Vous n\'êtes pas autorisé à visiter la page');
    }
}
