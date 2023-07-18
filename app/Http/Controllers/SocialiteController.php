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
            $locale = app()->getLocale();
            return Socialite::driver($provider)->with([
                'redirect_uri' => 'https://' . $locale . 'gokdo.com/callback/' . $provider,
            ])->redirect(); // On redirige vers le provider
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
            $nameLength = mb_strlen($name);
            $nameShort = '';

            // Vérifier si le nombre de caractères est supérieur ou égal à 4
            if ($nameLength >= 4) {
                $nameShort = mb_substr($name, 0, 4); // Récupérer les 4 premières lettres de $name
            } else {
                $nameShort = $name; // Utiliser le nom complet si moins de 4 caractères
            }

            $randomDigits = rand(1, 9999); // Générer 4 chiffres aléatoires (entre 1 et 9999)
            $nameWithDigits = $nameShort . $randomDigits; // créer la combinaison

            # 1. On récupère l'utilisateur à partir de l'adresse email
            $user = User::where("email", $email)->first();

            # 2. On récupère l'utilisateur à partir du pseudo
            $user2 = User::where("name", $nameWithDigits)->first();

            // Si le mail existe en bdd
            if (!empty($user->email)) {
                // Mise à jour des informations de l'utilisateur
                $user->save();
            } elseif (empty($user->email) && $user2 !== null && $user2->name != $nameWithDigits) {
                //$parrain = $request->input('parrain');
                // Si le mail n'existe pas et que le pseudo est différent de $randomDigits, on inscrit l'utilisateur
                $user = User::create([
                    'name' => $nameWithDigits, // Combinaison des lettres et des chiffres
                    'email' => $email,
                    'role' => 'user',
                    'password' => bcrypt("emiliedghioljfydesretyuioiuytrds"), // On fait un mot de passe
                    'parties' => '10', // on ajoute 10 parties gratuites
                    'trophee1' => '150',
                //      'parrain' => $parrain // On offre 150 diamants
                ]);
                //$request->session()->forget('parrain');

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
                //    $parrain = $request->input('parrain');
                // Inscrire l'utilisateur avec le nouveau pseudo unique
                $user = User::create([
                    'name' => $nameWithDigits, // Combinaison des lettres et des chiffres
                    'email' => $email,
                    'role' => 'user',
                    'password' => bcrypt("emiliedghioljfydesretyuioiuytrds"), // On fait un mot de passe
                    'parties' => '10', // on ajoute 10 parties gratuites
                    'trophee1' => '150',
                //  'parrain' => $parrain // On offre 150 diamants
                ]);

                // Utilisez la valeur du parrain comme vous le souhaitez

                // Effacez la clé "parrain" de la session pour éviter de l'utiliser à nouveau
                //$request->session()->forget('parrain');

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
