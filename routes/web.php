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
});

Route::controller(GlobalController::class)->group(function () {
    Route::get('/language/{locale}', function ($locale, Illuminate\Http\Request $request) {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        $redirectTo = $request->getScheme() . '://' . $locale . '.gokdo.com';
        return redirect($redirectTo);
    });

    Route::middleware('set-language')->group(function () {
        Route::domain('{locale?}.' . config('app.url'))->group(function () {
            Route::get('admin/register?parrain={le_parrain}', function ($le_parrain) {
                $parrainExiste = \App\Models\User::where('name', $le_parrain)->exists();
                if ($parrainExiste) {
                    return app(ParrainageController::class)->setParrainageLink(request(), $le_parrain);
                } else {
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
        });
    });

    Route::domain('{locale?}.' . config('app.url'))->middleware('set-language')->group(function () {
        Route::middleware(['cors'])->group(function () {
            Route::get('game/{id}', [GlobalController::class, 'game'])->name('specific-game');
        });

        Route::get('profil', [GlobalController::class, 'getProfil'])->name('getProfil');
        Route::post('order', [GlobalController::class, 'setOrder'])->name('setOrder');
        Route::post('setorderpack', [GlobalController::class, 'setOrderpack'])->name('setOrderpack');
        Route::post('confirm_order', [GlobalController::class, 'confirmOrder'])->name('confirmOrder');
        Route::post('confirm_orderpack', [GlobalController::class, 'confirmOrderpack'])->name('confirmOrderpack');
        Route::post('delete_order', [GlobalController::class, 'deleteOrder'])->name('deleteOrder');
        Route::post('delete_orderpack', [GlobalController::class, 'deleteOrderpack'])->name('deleteOrderpack');
        Route::post('save_address', [GlobalController::class, 'saveAddress'])->name('saveAddress');
        Route::post('deleteuser/{id}', [GlobalController::class, 'deleteUser'])->name('deleteUser');
    });
});

Route::post('contactmail', [MailController::class, 'sendMessage']);
Route::get('processtart', [ProcessController::class, 'execute']);
Route::get("redirect/{provider}", [SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get("callback/{provider}", [SocialiteController::class, 'callback'])->name('socialite.callback');