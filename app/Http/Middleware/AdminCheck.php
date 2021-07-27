<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $req, Closure $next)
    {
        if(auth()->check()){
            if(auth()->user()->isAdmin == "1"){
                return $next($req);
            } else {
                return abort(404);
            }
        } else {
            return abort(404);
        }
    }
}
