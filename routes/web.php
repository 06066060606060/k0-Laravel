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
            Route::get('admin/register', function () {
                return redirect()->route('backpack.auth.register');
            });
            Route::get('/', [GlobalController::class, 'getAll'])->name('getAll');
            Route::get('index', [GlobalController::class, 'getAll'])->name('getAll');
            Route::get('logout', [GlobalController::class, 'logout']);
            Route::get('jeux', [GlobalController::class, 'games']);
            Route::get('game/{id}', [GlobalController::class, 'game'])->name('specific-game');
            Route::get('pack', [GlobalController::class, 'pack']);
            Route::get('concours', [GlobalController::class, 'winner']);
            Route::get('cadeaux', [GlobalController::class, 'store'])->name('searchfilter');
            Route::get('contact', [GlobalController::class, 'contact']);
            Route::get('test', [GlobalController::class, 'test']);
            Route::get('aide', [GlobalController::class, 'aide']);
            Route::get('discord', [GlobalController::class, 'discord']);
            Route::get('reglement', [GlobalController::class, 'reglement']);
            Route::get('mentions-legales', [GlobalController::class, 'mentionslegales']);
            Route::get('confidentialite-site', [GlobalController::class, 'confidentialitesite']);
            Route::get('partenaires', [GlobalController::class, 'partenaires']);
        });
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
