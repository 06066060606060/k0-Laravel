<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\AcceptHeader;

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
        $fallbackLocale = config('app.fallback_locale');

        // Vérifier si la langue est déjà définie dans l'URL
        if ($request->segment(1) && in_array($request->segment(1), $availableLocales)) {
            $locale = $request->segment(1);
        } else {
            // Récupérer la langue préférée du navigateur
            $acceptHeader = AcceptHeader::fromString($request->server->get('HTTP_ACCEPT_LANGUAGE'));
            $browserLocales = $acceptHeader->get('language');

            // Utiliser la langue par défaut de l'application si aucune langue du navigateur n'est disponible
            if (!empty($browserLocales)) {
                $preferredLanguage = $browserLocales[0]->getValue();
                if (in_array($preferredLanguage, $availableLocales)) {
                    $locale = $preferredLanguage;
                } else {
                    $locale = $fallbackLocale;
                }
            } else {
                $locale = $fallbackLocale;
            }
        }

        App::setLocale($locale);
        Session::put('locale', $locale);

        // Supprimer le segment de langue de l'URL
        if ($request->segment(1) === $locale) {
            $request->server->set('REQUEST_URI', substr($request->server->get('REQUEST_URI'), strlen($locale) + 1));
        }

        return $next($request);
    }
}
