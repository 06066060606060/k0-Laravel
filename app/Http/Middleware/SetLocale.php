<?php

use Illuminate\Support\Facades\App;
use Mcamara\LaravelLocalization\LaravelLocalization;

// ...

public function handle($request, Closure $next)
{
    if ($request->session()->has('locale')) {
        $locale = $request->session()->get('locale');
        if (in_array($locale, LaravelLocalization::getSupportedLocales())) {
            App::setLocale($locale);
        }
    }

    return $next($request);
}
