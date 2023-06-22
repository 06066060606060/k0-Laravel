<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ParrainageController extends Controller
{
    public function setParrainageLink(Request $request, $le_parrain)
{
    // Vérifier si le parrain existe dans la table "users"
    $parrainExiste = User::where('name', $le_parrain)->exists();

    if ($parrainExiste) {
        // Stocker le parrain dans la session
        Session::put('parrain', $le_parrain);

        // Rediriger vers la page d'inscription avec le parrain comme paramètre
        return redirect()->route('backpack.auth.register', ['parrain' => $le_parrain]);
    } elseif ($le_parrain === '') {
        // Si aucun parrain n'est spécifié, rediriger vers la page d'inscription sans le paramètre de parrain
        return redirect()->route('backpack.auth.register');
    } else {
        // Si le parrain n'existe pas en base de données, afficher un message d'erreur ou rediriger vers une autre page
        return redirect()->route('backpack.auth.register');
    }
}

    
}