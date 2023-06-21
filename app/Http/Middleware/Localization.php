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
            // Récupérer les langues préférées du navigateur
            $negotiator = new LanguageNegotiator();
            $browserLocales = $negotiator->getAcceptedLanguages($request->header('Accept-Language'));
    
            // Chercher la première langue préférée du navigateur disponible dans la configuration
            foreach ($browserLocales as $browserLocale) {
                if (in_array($browserLocale, $availableLocales)) {
                    App::setLocale($browserLocale);
                    break;
                }
            }
    
            // Utiliser la langue par défaut de l'application si aucune langue du navigateur n'est disponible
            if (!App::getLocale()) {
                App::setLocale(config('app.fallback_locale'));
            }
        }
        
        return $next($request);
    }    
}
