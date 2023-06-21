<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Session as AppSession; // Rename the conflicting Session class
use Illuminate\Support\Facades\Session; // Use full namespace for Session facade
use Negotiation\LanguageNegotiator;

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
    
    // Vérifier si la langue est déjà définie dans la session
    if (Session::has('locale') && in_array(Session::get('locale'), $availableLocales)) {
        App::setLocale(Session::get('locale'));
    } else {
        // Récupérer la langue préférée du navigateur
        $negotiator = new LanguageNegotiator();
        $browserLocale = $negotiator->getPreferredLanguage($request->server->get('HTTP_ACCEPT_LANGUAGE'));

        // Définir la langue du navigateur comme langue par défaut si elle est disponible
        if (in_array($browserLocale, $availableLocales)) {
            App::setLocale($browserLocale);
        } else {
            // Utiliser la langue par défaut de l'application si la langue du navigateur n'est pas disponible
            App::setLocale(config('app.fallback_locale'));
        }
    }
    
    return $next($request);
}
}
