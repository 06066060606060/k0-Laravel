<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\SocialiteController;
use App\Http\Middleware\Cors;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::controller(GlobalController::class)->group(function(){
    // Route::get('/', 'getAll')->name('getAll')->middleware('App\Http\Middleware\MyMiddleware');
Route::get('/', 'getAll')->name('getAll');
Route::get('index', 'getAll')->name('getAll');
Route::get('logout', 'logout');
Route::get('allgames', 'games');
Route::get('game', 'game');
Route::get('pack', 'pack');
Route::get('winner', 'winner');
Route::get('store', 'store');
Route::get('help', 'help');
Route::get('contact', 'contact');
Route::post('contactus', 'contactus');
Route::get('test', 'test');
});

Route::middleware(['cors'])->group(function () {
    Route::get('game', [GlobalController::class, 'game']);
});

Route::get('legal' , [GlobalController::class, 'getLegal']);
Route::get('confidentialite' , [GlobalController::class, 'getConf']);

Route::get('profil', [GlobalController::class, 'getProfil'])->name('getProfil');

Route::post('order', [GlobalController::class, 'setOrder'])->name('setOrder');
Route::post('setorderpack', [GlobalController::class, 'setOrderpack'])->name('setOrderpack');

Route::get('order', [GlobalController::class, 'getProfil'])->name('getProfil');
Route::get('orderpack', [GlobalController::class, 'getProfil']);

Route::post('confirm_order', [GlobalController::class, 'confirmOrder'])->name('confirmOrder');
Route::post('confirm_orderpack', [GlobalController::class, 'confirmOrderpack'])->name('confirmOrderpack');
// Route::get('order', [GlobalController::class, 'getOrder'])->name('getOrder');
Route::post('delete_order', [GlobalController::class, 'deleteOrder'])->name('deleteOrder');

Route::get('delete_order',  [GlobalController::class, 'getProfil']);
Route::get('delete_orderpack', [GlobalController::class, 'getProfil']);

Route::post('delete_orderpack', [GlobalController::class, 'deleteOrderpack'])->name('deleteOrderpack');
Route::post('save_address', [GlobalController::class, 'saveAddress'])->name('saveAddress');

Route::post('deleteuser/{id}', [GlobalController::class, 'deleteUser'])->name('deleteUser');

Route::post('contactmail' , [MailController::class, 'sendMessage']);

// La redirection vers le provider
Route::get("redirect/{provider}",[SocialiteController::class, 'redirect'])->name('socialite.redirect');

// Le callback du provider
Route::get("callback/{provider}",[SocialiteController::class, 'callback'])->name('socialite.callback');