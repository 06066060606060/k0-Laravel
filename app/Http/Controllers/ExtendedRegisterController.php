<?php
namespace App\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\Auth\RegisterController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class ExtendedRegisterController extends RegisterController
{
    use RegistersUsers;

    public function validator(array $data)
    {
        $validator = Validator::make($data, [
            // Les règles de validation de base pour l'inscription
            // ...
            'parrain' => ['nullable', 'exists:users,id'],
        ]);

        return $validator;
    }

    protected function create(array $data)
    {
        event(new Registered($user = $this->register($data)));

        $parrain = $data['parrain'] ?? null;

        // Faites le traitement du champ "parrain" ici, par exemple :
        if ($parrain) {
            // Associez le parrain à l'utilisateur créé.
        }

        return $user;
    }
}
