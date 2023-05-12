<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       if(request()->path()=='admin/login') {
       if (backpack_auth()->user()->role == 'admin') {
        return redirect('/');

        } else if (backpack_auth()->user()->role == 'abo') {
            return redirect('/');
        } else{
            return redirect('/');
        }
        } else {
            if (backpack_auth()->user()->role == 'admin') {
                return $next($request);        
            } else if (backpack_auth()->user()->role == 'abo') {
                    return redirect('/');
                } else{
                    return redirect('/');
                }
        }
        
    }
}
