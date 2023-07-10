<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Pestopancake\LaravelBackpackNotifications\Notifications\DatabaseNotification;

class SocialiteController extends Controller
{
    protected $providers = [ "google", "github", "facebook" ];

    public function loginRegister () {
        return view("socialite.login-register");
    }

    public function redirect (Request $request) {
        $provider = $request->provider;
        if (in_array($provider, $this->providers)) {
            return Socialite::driver($provider)->redirect();
        }
        abort(404);
    }

    public function callback (Request $request) {
        $provider = $request->provider;

        if (in_array($provider, $this->providers)) {
            $data = Socialite::driver($provider)->stateless()->user();

            $email = $data->getEmail();
            $name = $data->getName();
            $nameLength = strlen($name);

            $nameShort = substr($name, 0, min(4, $nameLength));
            $randomDigits = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT); 
            $nameWithDigits = $nameShort . $randomDigits;

            if ($nameLength == 0) {
                $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
                $nameShort = '';
                $charactersLength = strlen($characters);
                
                for ($i = 0; $i < 4; $i++) {
                    $nameShort .= $characters[rand(0, $charactersLength - 1)];
                }
                $randomDigits = rand(1, 9999); 
                $nameWithDigits = $nameShort . $randomDigits;
            }

            $user = User::where("email", $email)->first();
            $user2 = User::where("name", $nameWithDigits)->first();

            if ($user) {
                $user->save();
            } elseif (!$user && $user2 !== null && $user2->name != $nameWithDigits) {
                $user = User::create([
                    'name' => $nameWithDigits,
                    'email' => $email,
                    'role' => 'user',
                    'password' => bcrypt("emiliedghioljfydesretyuioiuytrds"),
                    'parties' => '10',
                    'trophee1' => '150',
                ]);

                $admin = User::where('role', 'admin')->first();
                $admin->notify(
                    new DatabaseNotification(
                        ($type = 'info'),
                        ($message = 'Nouvelle Inscription'),
                        ($messageLong = 'Nouvelle Inscription: ' . $email)
                    )
                );
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
                    'trophee1' => '150'
                ]);

                $admin = User::where('role', 'admin')->first();
                $admin->notify(
                    new DatabaseNotification(
                        ($type = 'info'),
                        ($message = 'Nouvelle Inscription'),
                        ($messageLong = 'Nouvelle Inscription: ' . $email)
                    )
                );
            }

            backpack_auth()->login($user);
            return redirect('/');
        }
        abort(404);
    }
}
