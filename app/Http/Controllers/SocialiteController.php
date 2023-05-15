<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use Socialite;

use App\Models\User;
use Pestopancake\LaravelBackpackNotifications\Notifications\DatabaseNotification;

class SocialiteController extends Controller
{

  // Les tableaux des providers autorisés
    protected $providers = [ "google", "github", "facebook" ];

    # La vue pour les liens vers les providers
    public function loginRegister () {
    	return view("socialite.login-register");
    }

    # redirection vers le provider
    public function redirect (Request $request) {

        $provider = $request->provider;

        // On vérifie si le provider est autorisé
        if (in_array($provider, $this->providers)) {
 
            return Socialite::driver($provider)->redirect(); // On redirige vers le provider
        }
        abort(404); // Si le provider n'est pas autorisé
    }

// Callback du provider
public function callback (Request $request) {

    $provider = $request->provider;

    if (in_array($provider, $this->providers)) {

        // Les informations provenant du provider
        $data = Socialite::driver($provider)->stateless()->user();
      
# Social login - register
$email = $data->getEmail(); // L'adresse email
$name = $data->getName(); // le nom

// Compter le nombre de caractères dans $name
$nameLength = strlen($name);
// Vérifier si le nombre de caractères est supérieur ou égal à 4
if ($nameLength >= 4) {
$nameShort = substr($name, 0, 4); // Récupérer les 4 premières lettres de $name
$randomDigits = rand(1, 9999); // Générer 4 chiffres aléatoires (entre 1 et 9999)
$nameWithDigits = $nameShort . $randomDigits; // créer la combinaison
} elseif ($nameLength == 3) {
$nameShort = substr($name, 0, 3); // Récupérer la sous-chaîne de longueur égale au nombre de caractères
$randomDigits = rand(1, 9999); // Générer 4 chiffres aléatoires (entre 1 et 9999)
$nameWithDigits = $nameShort . $randomDigits; // créer la combinaison
} elseif ($nameLength == 2) {
    $nameShort = substr($name, 0, 2); // Récupérer la sous-chaîne de longueur égale au nombre de caractères
    $randomDigits = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT); // Générer 4 chiffres aléatoires (entre 1 et 9999)
    $nameWithDigits = $nameShort . $randomDigits; // créer la combinaison
} elseif ($nameLength == 1) {
    $nameShort = substr($name, 0, 1); // Récupérer la sous-chaîne de longueur égale au nombre de caractères
    $randomDigits = rand(1, 9999); // Générer 4 chiffres aléatoires (entre 1 et 9999)
    $nameWithDigits = $nameShort . $randomDigits; // créer la combinaison
} elseif ($nameLength == 0) {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $nameShort = '';
    $charactersLength = strlen($characters);
    
    for ($i = 0; $i < 4; $i++) {
        $nameShort .= $characters[rand(0, $charactersLength - 1)];
    }
    $randomDigits = rand(1, 9999); // Générer 4 chiffres aléatoires (entre 1 et 9999)
    $nameWithDigits = $nameShort . $randomDigits; // créer la combinaison
}


# 1. On récupère l'utilisateur à partir de l'adresse email
$user = User::where("email", $email)->first();

# 2. On récupère l'utilisateur à partir du pseudo
$user2 = User::where("name", $nameWithDigits)->first();

// Si le mail existe en bdd
if (!empty($user->email)) {
    // Mise à jour des informations de l'utilisateur
    $user->save();
} elseif (empty($user->email) && $user2 !== null && $user2->name != $nameWithDigits) {
    // Si le mail n'existe pas et que le pseudo est différent de $randomDigits, on inscrit l'utilisateur
    $user = User::create([
        'name' => $nameWithDigits, // Combinaison des lettres et des chiffres
        'email' => $email,
        'role' => 'user',
        'password' => bcrypt("emiliedghioljfydesretyuioiuytrds"), // On fait un mot de passe
        'parties' => '10', // on ajoute 10 parties gratuites
        'trophee1' => '150' // On offre 150 diamants
    ]);
    //create notification
    $admin = User::where('role', 'admin')->first();
    $admin->notify(
        new DatabaseNotification(
            ($type = 'info'), // info / success / warning / error
            ($message = 'Nouvelle Inscription'),
            ($messageLong = 'Nouvelle Inscription: ' . $email)
        )
    );
} else {
    // Boucle pour générer un nouveau pseudo jusqu'à ce qu'il soit unique
    do {
        $randomDigits = rand(1, 99999); // Générer 4 chiffres aléatoires (entre 1 et 9999)
        $nameWithDigits = $nameShort . $randomDigits; // créer la combinaison
        $user3 = User::where("name", $nameWithDigits)->first();
    } while ($user3 !== null);

    // Inscrire l'utilisateur avec le nouveau pseudo unique
    $user = User::create([
        'name' => $nameWithDigits, // Combinaison des lettres et des chiffres
        'email' => $email,
        'role' => 'user',
        'password' => bcrypt("emiliedghioljfydesretyuioiuytrds"), // On fait un mot de passe
        'parties' => '10', // on ajoute 10 parties gratuites
        'trophee1' => '150' // On offre 150 diamants
    ]);
    //create notification
    $admin = User::where('role', 'admin')->first();
    $admin->notify(
        new DatabaseNotification(
            ($type = 'info'), // info / success / warning / error
            ($message = 'Nouvelle Inscription'),
            ($messageLong = 'Nouvelle Inscription: ' . $email)
        )
    );
 }

        # 4. On connecte l'utilisateur
        backpack_auth()->login($user);

        # 5. On redirige l'utilisateur vers /home avec un message de succès
        return redirect('/');
     }
     abort(404);
}
}