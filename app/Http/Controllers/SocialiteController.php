<?php

namespace App\Http\Controllers;

use Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Pestopancake\LaravelBackpackNotifications\Notifications\DatabaseNotification;

class SocialiteController extends Controller
{
    protected $providers = ["google", "github", "facebook"];

    public function loginRegister()
    {
        return view("socialite.login-register");
    }

    public function redirect(Request $request)
    {
        $provider = $request->provider;

        if (in_array($provider, $this->providers)) {
            $redirectUri = url('/callback/' . $provider);
            return Socialite::driver($provider)
                ->with(['redirect_uri' => $redirectUri])
                ->redirect();
        }

        abort(404);
    }

    public function callback(Request $request)
    {
        $provider = $request->provider;

        if (in_array($provider, $this->providers)) {
            $data = Socialite::driver($provider)->stateless()->user();
          
            $email = $data->getEmail();
            $name = $data->getName();

            $nameShort = substr($name, 0, 4);
            $nameWithDigits = $nameShort . rand(1, 9999);

            $user = User::where("email", $email)->first();
            $user2 = User::where("name", $nameWithDigits)->first();

            if (!empty($user->email)) {
                $user->save();
                backpack_auth()->login($user); // Connexion de l'utilisateur créé

            } elseif (empty($user->email) && $user2 !== null && $user2->name != $nameWithDigits) {
                $user = User::create([
                    'name' => $nameWithDigits,
                    'email' => $email,
                    'role' => 'user',
                    'password' => bcrypt("emiliedghioljfydesretyuioiuytrds"),
                    'parties' => '10',
                    'trophee1' => '150',
                ]);

                $this->createNewUserNotification($email);

                backpack_auth()->login($user); // Connexion de l'utilisateur créé
            } else {
                do {
                    $randomDigits = rand(1, 99999);
                    $nameWithDigits = $nameShort . $randomDigits;
                    $user3 = User::where("name", $nameWithDigits)->first();
                } while ($user3 !== null);

                $user = User::create([
                    'name' => $nameWithDigits,
                    'email' => $email,
                    'role' => 'user',
                    'password' => bcrypt("emiliedghioljfydesretyuioiuytrds"),
                    'parties' => '10',
                    'trophee1' => '150',
                ]);

                $this->createNewUserNotification($email);

                backpack_auth()->login($user); // Connexion de l'utilisateur créé
                Session::put('notification', true);
            }
            return redirect('/');
        }

        abort(404);
    }

    private function createNewUserNotification($email)
    {
        $admin = User::where('role', 'admin')->first();
        $admin->notify(
            new DatabaseNotification(
                'info',
                'Nouvelle Inscription',
                'Nouvelle Inscription: ' . $email
            )
        );
    }
}
