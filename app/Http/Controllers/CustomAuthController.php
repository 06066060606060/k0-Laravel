<?php
use Backpack\CRUD\app\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

public function register(Request $request)
{
    // Récupérer les données du formulaire d'inscription
    $data = $request->all();

    // Vérifier si un parrain est spécifié dans la requête
    if ($request->has('parrain')) {
        // Récupérer le pseudo du parrain depuis la requête
        $parrain = $request->input('parrain');

        // Ajouter le parrain à la liste des données à enregistrer dans la table "users"
        $data['parrain'] = $parrain;
    }

    // Enregistrer l'utilisateur dans la table "users"
    $user = User::create($data);

    // Autres actions d'inscription...

    // Rediriger vers la page de succès ou toute autre page appropriée
    return redirect()->route('registration.success');
}
