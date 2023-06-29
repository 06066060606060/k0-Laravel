<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Session as AppSession; // Renommez la classe Session pour éviter les conflits
use Symfony\Component\HttpFoundation\AcceptHeader;

class Localization
{
    public function handle(Request $request, Closure $next)
    {
        $availableLocales = config('app.available_locales');

        // Vérifier si la langue est déjà définie dans la session
        if (AppSession::has('locale') && in_array(AppSession::get('locale'), $availableLocales)) {
            App::setLocale(AppSession::get('locale'));
        } else {
            // Récupérer la langue préférée du navigateur
            $acceptHeader = AcceptHeader::fromString($request->server->get('HTTP_ACCEPT_LANGUAGE'));
            $browserLocales = $acceptHeader->get('language');

            // Utiliser la langue par défaut de l'application si aucune langue du navigateur n'est disponible
            if (!empty($browserLocales)) {
                $preferredLanguage = $browserLocales[0]->getValue();
                if (in_array($preferredLanguage, $availableLocales)) {
                    App::setLocale($preferredLanguage);
                    AppSession::put('locale', $preferredLanguage);
                } else {
                    App::setLocale(config('app.fallback_locale'));
                    AppSession::put('locale', config('app.fallback_locale'));
                }
            } else {
                App::setLocale(config('app.fallback_locale'));
                AppSession::put('locale', config('app.fallback_locale'));
            }
        }

        // Ajoutez le préfixe de langue à toutes les URLs générées par Laravel
        $this->setLanguagePrefix($request);

        return $next($request);
    }

    private function setLanguagePrefix(Request $request)
    {
        $locale = App::getLocale();

        // Vérifier si le préfixe de langue est déjà présent dans l'URL
        if ($request->segment(1) !== $locale) {
            // Obtenir l'URI actuelle sans le préfixe de langue
            $uri = $request->path();

            // Générer l'URL complète avec le préfixe de langue
            $url = url("/$locale/$uri");

            // Rediriger vers la nouvelle URL
            return redirect()->to($url);
        }
    }
}
