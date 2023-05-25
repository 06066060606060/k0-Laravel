<?php

namespace App\Http\Middleware;

use Closure;

public function handle($request, Closure $next)
{
    if (session()->has('locale')) {
        $locale = session()->get('locale');
    } else {
        $locale = config('app.fallback_locale');
    }

    app()->setLocale($locale);

    return $next($request);
}
