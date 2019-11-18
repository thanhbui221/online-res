<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request , Closure $next)
    {
        if ($request->user() == NULL or $request->user()->id != 9  ){
            abort(403,'Unauthorized action');
        }
        return $next($request);
    }
}
