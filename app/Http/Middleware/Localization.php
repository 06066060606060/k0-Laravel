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
    public function handle($request, Closure $next)
    {
        $availableLocales = config('app.available_locales');
        
        $userPreferredLanguages = $request->getLanguages();
        
        foreach ($userPreferredLanguages as $language) {
            if (in_array($language, $availableLocales)) {
                App::setLocale($language);
                break;
            }
        }
        
        return $next($request);
    }
}
