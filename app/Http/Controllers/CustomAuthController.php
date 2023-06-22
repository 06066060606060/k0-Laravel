<?php
namespace App\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends AuthController
{
    public function register(Request $request)
    {
        $parrain = Session::get('parrain'); // Récupérer le parrain de la session

        // Appel de la méthode register du contrôleur parent pour effectuer le reste du processus d'inscription
        $response = parent::register($request);

        // Récupérer l'utilisateur nouvellement créé
        $user = $response->original;

        // Récupérer le parrain de la session
        $parrain = Session::get('parrain');

        // Mettre à jour la colonne "parrain" de l'utilisateur nouvellement créé
        $user->parrain = $parrain;
        $user->save();

        // Retourner la réponse originale
        return parent::register($request);
    }

    // Autres méthodes du contrôleur...
}