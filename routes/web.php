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

Route::group(['middleware' => ['web']], function () {
    Route::get('/admin/register', [ExtendedRegisterController::class, 'showRegistrationForm'])->name('backpack.auth.register');
    Route::post('/admin/register', [ExtendedRegisterController::class, 'register'])->name('backpack.auth.register');
    Route::post('/register', [ExtendedRegisterController::class, 'register']);
});
// SELECTION ET DEFINITION DE LA LANGUE
Route::prefix('language')->group(function () {
Route::get('/{locale}', function ($locale) {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    });
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
    Route::prefix('{locale}')->group(function () {
        Route::get('/', 'GlobalController@getAll')->name('getAll');
        Route::get('index', 'GlobalController@getAll')->name('getAll');
        Route::get('logout', 'GlobalController@logout');
        Route::get('jeux', 'GlobalController@games');
        Route::get('game', 'GlobalController@game');
        Route::get('pack', 'GlobalController@pack');
        Route::get('concours', 'GlobalController@winner');
        Route::get('cadeaux', 'GlobalController@store');
        Route::get('cadeaux', 'GlobalController@search')->name('searchfilter');
        Route::get('contact', 'GlobalController@contact');
        Route::get('test', 'GlobalController@test');
        Route::get('aide', 'GlobalController@aide');
        Route::get('discord', 'GlobalController@discord');
        Route::get('reglement', 'GlobalController@reglement');
        Route::get('mentions-legales', 'GlobalController@mentionslegales');
        Route::get('confidentialite-site', 'GlobalController@confidentialitesite');
        Route::get('partenaires', 'GlobalController@partenaires');
    });

Route::middleware(['cors'])->group(function () {
    Route::get('game', [GlobalController::class, 'game']);
});

Route::prefix('{locale}')->group(function () {
    Route::get('profil', 'GlobalController@getProfil')->name('getProfil');
    
    Route::post('order', 'GlobalController@setOrder')->name('setOrder');
    Route::post('setorderpack', 'GlobalController@setOrderpack')->name('setOrderpack');
    
    Route::get('order', 'GlobalController@getProfil')->name('getProfil');
    Route::get('orderpack', 'GlobalController@getProfil');
    
    Route::post('confirm_order', 'GlobalController@confirmOrder')->name('confirmOrder');
    Route::post('confirm_orderpack', 'GlobalController@confirmOrderpack')->name('confirmOrderpack');
    
    Route::post('delete_order', 'GlobalController@deleteOrder')->name('deleteOrder');
    Route::get('delete_order', 'GlobalController@getProfil');
    Route::get('delete_orderpack', 'GlobalController@getProfil');
    Route::post('delete_orderpack', 'GlobalController@deleteOrderpack')->name('deleteOrderpack');
    
    Route::post('save_address', 'GlobalController@saveAddress')->name('saveAddress');
    Route::post('deleteuser/{id}', 'GlobalController@deleteUser')->name('deleteUser');
    Route::post('contactmail', 'MailController@sendMessage');
    Route::get('processtart', 'ProcessController@execute');
    Route::get("redirect/{provider}", 'SocialiteController@redirect')->name('socialite.redirect');
    Route::get("callback/{provider}", 'SocialiteController@callback')->name('socialite.callback');
});