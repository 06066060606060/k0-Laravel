 if (session()->has('locale')) {
        $locale = session()->get('locale');
    } else {
        $locale = config('app.fallback_locale');
    }

    app()->setLocale($locale);

    return $next($request);