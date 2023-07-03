<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SetLanguage
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
        $urlLocale = $request->route()->parameter('locale');
        $sessionLocale = app()->getLocale();
        if (empty($urlLocale) || !in_array($urlLocale, config('app.available_locales'))) {
            $redirectTo = '/' . $sessionLocale . $request->getPathInfo();
            return redirect($redirectTo);
        } elseif ($urlLocale != $sessionLocale) {
            app()->setLocale($urlLocale);
            session()->put('locale', $urlLocale);
        }
        return $next($request);
    }
}
