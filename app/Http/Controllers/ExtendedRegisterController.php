<?php
namespace App\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Auth\RegisterController;

class ExtendedRegisterController extends RegisterController
{
    public function validator(array $data)
    {
        $validator = parent::validator($data);
    
        $validator->addRules([
            'parrain' => ['nullable', 'exists:users,id'],
        ]);
    
        return $validator;
    }


    protected function create(array $data)
{
    $user = parent::create($data);

    $parrain = $data['parrain'] ?? null;

    // Faites le traitement du champ "parrain" ici, par exemple :
    if ($parrain) {
        // Associez le parrain à l'utilisateur créé.
    }

    return $user;
}
}
