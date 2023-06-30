<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLanguage
{
    public function handle(Request $request, Closure $next)
    {
        $availableLanguages = ['en', 'fr', 'es', 'de','It']; // Add more languages if needed
        
        // Check if the language code is present in the URL
        $segments = $request->segments();
        
        if (count($segments) > 0 && in_array($segments[0], $availableLanguages)) {
            // Language code found in the URL, set the locale
            $locale = $segments[0];
            app()->setLocale($locale);
            
            // Remove the language code segment from the URL
            unset($segments[0]);
            
            // Update the request URL without the language code
            $request->server->set('REQUEST_URI', '/' . implode('/', $segments));
        } else {
            // No language code found, use the default locale or preferred language
            $locale = $request->getPreferredLanguage($availableLanguages);
            app()->setLocale($locale);
        }
        
        return $next($request);
    }
}
