<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Session as AppSession; // Rename the conflicting Session class
use Illuminate\Support\Facades\Session; // Use full namespace for Session facade

class Localization
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
        $availableLocales = config('app.available_locales');
        
        if (Session::has('locale') && in_array(Session::get('locale'), $availableLocales)) {
            App::setLocale(Session::get('locale'));
        }
        
        return $next($request);
    }
}
