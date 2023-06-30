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

// English routes
Route::group(['prefix' => 'en'], function () {
    Route::group(['middleware' => ['web']], function () {
        Route::get('/admin/register', [ExtendedRegisterController::class, 'showRegistrationForm'])->name('backpack.auth.register');
        Route::post('/admin/register', [ExtendedRegisterController::class, 'register'])->name('backpack.auth.register');
        Route::post('/register', [ExtendedRegisterController::class, 'register']);
    });

    Route::controller(GlobalController::class)->group(function () {
        Route::get('language/{locale}', function ($locale) {
            app()->setLocale($locale);
            session()->put('locale', $locale);
            return redirect()->back();
        });
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
        Route::get('game', 'game');
        Route::get('pack', 'pack');
        Route::get('concours', 'winner');
        Route::get('cadeaux', 'store');
        Route::get('cadeaux', 'search')->name('searchfilter');
        Route::get('{lang}/contact', 'ContactController@contact');
        Route::get('test', 'test');
        Route::get('aide', 'aide');
        Route::get('discord', 'discord');
        Route::get('reglement', 'reglement');
        Route::get('mentions-legales', 'mentionslegales');
        Route::get('confidentialite-site', 'confidentialitesite');
        Route::get('partenaires', 'partenaires');
    });

    Route::middleware(['cors'])->group(function () {
        Route::get('game', [GlobalController::class, 'game']);
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

    Route::post('delete_orderpack', [GlobalController::class, 'deleteOrderpack'])->name('deleteOrderpack');
    Route::post('save_address', [GlobalController::class, 'saveAddress'])->name('saveAddress');

    Route::post('deleteuser/{id}', [GlobalController::class, 'deleteUser'])->name('deleteUser');

    Route::post('contactmail', [MailController::class, 'sendMessage']);

    Route::get('processtart', [ProcessController::class, 'execute']);

    Route::get("redirect/{provider}", [SocialiteController::class, 'redirect'])->name('socialite.redirect');

    Route::get("callback/{provider}", [SocialiteController::class, 'callback'])->name('socialite.callback');
});

// French routes
Route::group(['prefix' => 'fr'], function () {
    Route::group(['middleware' => ['web']], function () {
        // French routes
        Route::get('/admin/register', [ExtendedRegisterController::class, 'showRegistrationForm'])->name('backpack.auth.register');
        Route::post('/admin/register', [ExtendedRegisterController::class, 'register'])->name('backpack.auth.register');
        Route::post('/register', [ExtendedRegisterController::class, 'register']);
    });

    Route::controller(GlobalController::class)->group(function () {
        // French routes for GlobalController
        Route::get('language/{locale}', function ($locale) {
            app()->setLocale($locale);
            session()->put('locale', $locale);
            return redirect()->back();
        });
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
        Route::get('game', 'game');
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

    Route::middleware(['cors'])->group(function () {
        Route::get('game', [GlobalController::class, 'game']);
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

    Route::post('delete_orderpack', [GlobalController::class, 'deleteOrderpack'])->name('deleteOrderpack');
    Route::post('save_address', [GlobalController::class, 'saveAddress'])->name('saveAddress');

    Route::post('deleteuser/{id}', [GlobalController::class, 'deleteUser'])->name('deleteUser');

    Route::post('contactmail', [MailController::class, 'sendMessage']);

    Route::get('processtart', [ProcessController::class, 'execute']);

    Route::get("redirect/{provider}", [SocialiteController::class, 'redirect'])->name('socialite.redirect');

    Route::get("callback/{provider}", [SocialiteController::class, 'callback'])->name('socialite.callback');
});

// Spanish routes
Route::group(['prefix' => 'es'], function () {
    Route::group(['middleware' => ['web']], function () {
        // Spanish routes
        Route::get('/admin/register', [ExtendedRegisterController::class, 'showRegistrationForm'])->name('backpack.auth.register');
        Route::post('/admin/register', [ExtendedRegisterController::class, 'register'])->name('backpack.auth.register');
        Route::post('/register', [ExtendedRegisterController::class, 'register']);
    });

    Route::controller(GlobalController::class)->group(function () {
        // Spanish routes for GlobalController
        Route::get('language/{locale}', function ($locale) {
            app()->setLocale($locale);
            session()->put('locale', $locale);
            return redirect()->back();
        });
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
        Route::get('game', 'game');
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

    Route::middleware(['cors'])->group(function () {
        Route::get('game', [GlobalController::class, 'game']);
    });

    Route::get('perfil', [GlobalController::class, 'getProfil'])->name('getProfil');

    Route::post('pedido', [GlobalController::class, 'setOrder'])->name('setOrder');
    Route::post('setorderpack', [GlobalController::class, 'setOrderpack'])->name('setOrderpack');

    Route::get('pedido', [GlobalController::class, 'getProfil'])->name('getProfil');
    Route::get('orderpack', [GlobalController::class, 'getProfil']);

    Route::post('confirmar_pedido', [GlobalController::class, 'confirmOrder'])->name('confirmOrder');
    Route::post('confirm_orderpack', [GlobalController::class, 'confirmOrderpack'])->name('confirmOrderpack');
    Route::post('borrar_pedido', [GlobalController::class, 'deleteOrder'])->name('deleteOrder');

    Route::get('borrar_pedido', [GlobalController::class, 'getProfil']);
    Route::get('delete_orderpack', [GlobalController::class, 'getProfil']);

    Route::post('delete_orderpack', [GlobalController::class, 'deleteOrderpack'])->name('deleteOrderpack');
    Route::post('guardar_direccion', [GlobalController::class, 'saveAddress'])->name('saveAddress');

    Route::post('deleteuser/{id}', [GlobalController::class, 'deleteUser'])->name('deleteUser');

    Route::post('contactomail', [MailController::class, 'sendMessage']);

    Route::get('processtart', [ProcessController::class, 'execute']);

    Route::get("redirect/{provider}", [SocialiteController::class, 'redirect'])->name('socialite.redirect');

    Route::get("callback/{provider}", [SocialiteController::class, 'callback'])->name('socialite.callback');
});

// German routes
Route::group(['prefix' => 'de'], function () {
    Route::group(['middleware' => ['web']], function () {
        // German routes
        Route::get('/admin/register', [ExtendedRegisterController::class, 'showRegistrationForm'])->name('backpack.auth.register');
        Route::post('/admin/register', [ExtendedRegisterController::class, 'register'])->name('backpack.auth.register');
        Route::post('/register', [ExtendedRegisterController::class, 'register']);
    });

    Route::controller(GlobalController::class)->group(function () {
        // German routes for GlobalController
        Route::get('language/{locale}', function ($locale) {
            app()->setLocale($locale);
            session()->put('locale', $locale);
            return redirect()->back();
        });
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
        Route::get('game', 'game');
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

    Route::middleware(['cors'])->group(function () {
        Route::get('game', [GlobalController::class, 'game']);
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

    Route::post('delete_orderpack', [GlobalController::class, 'deleteOrderpack'])->name('deleteOrderpack');
    Route::post('save_address', [GlobalController::class, 'saveAddress'])->name('saveAddress');

    Route::post('deleteuser/{id}', [GlobalController::class, 'deleteUser'])->name('deleteUser');

    Route::post('contactmail', [MailController::class, 'sendMessage']);

    Route::get('processtart', [ProcessController::class, 'execute']);

    Route::get("redirect/{provider}", [SocialiteController::class, 'redirect'])->name('socialite.redirect');

    Route::get("callback/{provider}", [SocialiteController::class, 'callback'])->name('socialite.callback');
});

// Italian routes
Route::group(['prefix' => 'it'], function () {
    Route::group(['middleware' => ['web']], function () {
        // Italian routes
        Route::get('/admin/register', [ExtendedRegisterController::class, 'showRegistrationForm'])->name('backpack.auth.register');
        Route::post('/admin/register', [ExtendedRegisterController::class, 'register'])->name('backpack.auth.register');
        Route::post('/register', [ExtendedRegisterController::class, 'register']);
    });

    Route::controller(GlobalController::class)->group(function () {
        // Italian routes for GlobalController
        Route::get('language/{locale}', function ($locale) {
            app()->setLocale($locale);
            session()->put('locale', $locale);
            return redirect()->back();
        });
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
        Route::get('game', 'game');
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

    Route::middleware(['cors'])->group(function () {
        Route::get('game', [GlobalController::class, 'game']);
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

    Route::post('delete_orderpack', [GlobalController::class, 'deleteOrderpack'])->name('deleteOrderpack');
    Route::post('save_address', [GlobalController::class, 'saveAddress'])->name('saveAddress');

    Route::post('deleteuser/{id}', [GlobalController::class, 'deleteUser'])->name('deleteUser');

    Route::post('contactmail', [MailController::class, 'sendMessage']);

    Route::get('processtart', [ProcessController::class, 'execute']);

    Route::get("redirect/{provider}", [SocialiteController::class, 'redirect'])->name('socialite.redirect');

    Route::get("callback/{provider}", [SocialiteController::class, 'callback'])->name('socialite.callback');
});

// Add your own routes for other languages here
