<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckContent
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
        if ($request->content <= 20) {
            return redirect('/');
        }
        return $next($request);
    }
}