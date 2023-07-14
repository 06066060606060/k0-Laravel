<?php

use App\Http\Middleware\Cors;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\ParrainageController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\ExtendedRegisterController;


Route::domain('{locale?}.' . config('app.url'))->middleware(['web', 'set-language'])->group(function () {
    Route::get('/admin/register', [ExtendedRegisterController::class, 'showRegistrationForm'])->name('backpack.auth.register');
    Route::post('/admin/register', [ExtendedRegisterController::class, 'register'])->name('backpack.auth.register');
    Route::post('/register', [ExtendedRegisterController::class, 'register']);
    Route::get("callback/{provider}", [SocialiteController::class, 'callback'])->name('socialite.callback');

        // Updated route for login
});

Route::controller(GlobalController::class)->group(function () {
    Route::get('/language/{locale}', function ($locale, Illuminate\Http\Request $request) {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $redirectTo = $request->getScheme() . '://' . $locale . '.' . env('APP_DOMAIN');
        return redirect($redirectTo);
    });

    Route::middleware('set-language')->group(function () {
        Route::domain('{locale?}.' . config('app.url'))->group(function () {
            Route::get('admin/register?parrain={le_parrain}', function ($le_parrain) {
                // Vérifier si le parrain existe dans la table "users"
                $parrainExiste = \App\Models\User::where('name', $le_parrain)->exists();

                if ($parrainExiste) {
                    // Si le parrain existe, rediriger vers la méthode "setParrainageLink" du contrôleur
                    return app(ParrainageController::class)->setParrainageLink(request(), $le_parrain);
                } else {
                    // Si le parrain n'existe pas, rediriger vers une autre page ou afficher un message d'erreur
                    return redirect()->route('backpack.auth.register');
                }
            })->name('parrainage.link');

            Route::get('/', 'getAll')->name('getAll');
            Route::get('index', 'getAll')->name('getAll');
            Route::get('logout', 'logout');
            Route::get('jeux', 'games');
            Route::get('game/{id}', [GlobalController::class, 'game'])->name('specific-game');
            Route::get('pack', 'pack');
            Route::get('concours', 'winner');
            Route::get('cadeaux', 'store');
            Route::get('cadeaux', 'search')->name('searchfilter');
            Route::get('contact', 'contact');
            Route::get('test', 'test');
            Route::get('aide', 'aide');
            Route::get('discord', 'discord');
            Route::get('reglement', 'reglement');
            Route::get('mentions-legales', 'mentionslegales');
            Route::get('confidentialite-site', 'confidentialitesite');
            Route::get('partenaires', 'partenaires');
            Route::get("callback/{provider}", [SocialiteController::class, 'callback'])->name('socialite.callback');

        });

        Route::get('admin/register?parrain={le_parrain}', function ($le_parrain) {
            // Vérifier si le parrain existe dans la table "users"
            $parrainExiste = \App\Models\User::where('name', $le_parrain)->exists();

            if ($parrainExiste) {
                // Si le parrain existe, rediriger vers la méthode "setParrainageLink" du contrôleur
                return app(ParrainageController::class)->setParrainageLink(request(), $le_parrain);
            } else {
                // Si le parrain n'existe pas, rediriger vers une autre page ou afficher un message d'erreur
                return redirect()->route('backpack.auth.register');
            }
        })->name('parrainage.link');

        Route::get('/', 'getAll')->name('getAll');
        Route::get('index', 'getAll')->name('getAll');
        Route::get('logout', 'logout');
        Route::get('jeux', 'games');
        Route::get('game/{id}', [GlobalController::class, 'game'])->name('specific-game');
        Route::get('pack', 'pack');
        Route::get('concours', 'winner');
        Route::get('cadeaux', 'store');
        Route::get('cadeaux', 'search')->name('searchfilter');
        Route::get('contact', 'contact');
        Route::get('test', 'test');
        Route::get('aide', 'aide');
        Route::get('discord', 'discord');
        Route::get('reglement', 'reglement');
        Route::get('mentions-legales', 'mentionslegales');
        Route::get('confidentialite-site', 'confidentialitesite');
        Route::get('partenaires', 'partenaires');
        Route::get("callback/{provider}", [SocialiteController::class, 'callback'])->name('socialite.callback');

    });
});

Route::domain('{locale?}.' . config('app.url'))->middleware('set-language')->group(function () {
    Route::middleware(['cors'])->group(function () {
        // Route pour le jeu avec un paramètre "id" spécifique (ex: id=46)
        Route::get('game/{id}', [GlobalController::class, 'game'])->name('specific-game');
    });

    Route::get('profil', [GlobalController::class, 'getProfil'])->name('getProfil');

    Route::post('order', [GlobalController::class, 'setOrder'])->name('setOrder');
    Route::post('setorderpack', [GlobalController::class, 'setOrderpack'])->name('setOrderpack');

    Route::get('order', [GlobalController::class, 'getProfil'])->name('getProfil');
    Route::get('orderpack', [GlobalController::class, 'getProfil']);

    Route::post('confirm_order', [GlobalController::class, 'confirmOrder'])->name('confirmOrder');
    Route::post('confirm_orderpack', [GlobalController::class, 'confirmOrderpack'])->name('confirmOrderpack');
// Route::get('order', [GlobalController::class, 'getOrder'])->name('getOrder');
    Route::post('delete_order', [GlobalController::class, 'deleteOrder'])->name('deleteOrder');

    Route::get('delete_order', [GlobalController::class, 'getProfil']);
    Route::get('delete_orderpack', [GlobalController::class, 'getProfil']);
});
Route::post('delete_orderpack', [GlobalController::class, 'deleteOrderpack'])->name('deleteOrderpack');
Route::post('save_address', [GlobalController::class, 'saveAddress'])->name('saveAddress');

Route::post('deleteuser/{id}', [GlobalController::class, 'deleteUser'])->name('deleteUser');

Route::post('contactmail', [MailController::class, 'sendMessage']);

Route::get('processtart', [ProcessController::class, 'execute']);

// La redirection vers le provider
Route::get("redirect/{provider}", [SocialiteController::class, 'redirect'])->name('socialite.redirect');

// Le callback du provider
Route::get("callback/{provider}", [SocialiteController::class, 'callback'])->name('socialite.callback');
