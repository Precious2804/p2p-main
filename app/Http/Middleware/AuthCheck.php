<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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

        if (!session()->has('loggedUser') && ($req->path() !='login' && $req->path() !='register')){
            return redirect('login')->with('fail', "You Must Login First");
        }
        if (session()->has('loggedUser') && ($req->path() =='login' || $req->path() =='register')){
            return redirect('dashboard');
        }

        return $next($req)->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
                            ->header('Pragma', 'no-cache')
                            ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
