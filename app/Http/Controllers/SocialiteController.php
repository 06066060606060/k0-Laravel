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
        $nameShort = substr($name, 0, 4); // Récupérer les 2 premières lettres de $name
        $randomDigits = rand(1, 9999); // Générer 3 chiffres aléatoires (entre 100 et 999)            
        $nameWithDigits = $nameShort . $randomDigits; // créé la combinaison

        
        # 1. On récupère l'utilisateur à partir de l'adresse email
        $user = User::where("email", $email)->first();
        # 1. On récupère l'utilisateur à partir du pseudo
        $user2 = User::where("name", $nameWithDigits)->first();

        // Si le mail existe en bdd        
        if (!empty($user->email)) {
            // Mise à jour des informations de l'utilisateur
            $user->save();

        # 3. Si l'utilisateur n'existe pas && le pseudo est différend d'un enregistré en bdd on l'enregistre
        } elseif (empty($user->email) && $user->name != $randomDigits) {            
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