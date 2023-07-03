<?php

use App\Http\Middleware\MyMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlobalController;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.
Route::controller(GlobalController::class)->group(function () {
    Route::get('/language/{locale}', function ($locale) {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect('/');
    });
Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('games', 'GamesCrudController');
    Route::crud('pages', 'PagesCrudController');
    Route::crud('scores', 'ScoresCrudController');
    Route::crud('cadeaux', 'CadeauxCrudController');
    Route::crud('concours', 'ConcoursCrudController');
    Route::crud('commandes', 'CommandesCrudController');
    Route::crud('packs', 'PacksCrudController');
    Route::crud('paiements', 'PaiementsCrudController');
    Route::crud('gains', 'GainsCrudController');
}); // this should be the absolute last line of this file
});