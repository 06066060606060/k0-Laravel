<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MyMiddleware;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

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
}); // this should be the absolute last line of this file