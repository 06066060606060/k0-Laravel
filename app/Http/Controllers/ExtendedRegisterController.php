<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Backpack\CRUD\app\Library\Auth\RegistersUsers;
use Backpack\CRUD\app\Http\Controllers\Auth\RegisterController;

class ExtendedRegisterController extends RegisterController
{
    use RegistersUsers;

    public function __construct()
    {
        $guard = backpack_guard_name();
        $this->middleware("guest:$guard");
        $this->redirectTo = property_exists($this, 'redirectTo') ? $this->redirectTo : config('backpack.base.route_prefix', 'dashboard');
    }

    protected function validator(array $data)
    {
        $user_model_fqn = config('backpack.base.user_model_fqn');
        $user = new $user_model_fqn();
        $users_table = $user->getTable();
        $email_validation = backpack_authentication_column() == 'email' ? 'email|' : '';

        return Validator::make($data, [
            'name' => 'required|max:255',
            backpack_authentication_column() => 'required|' . $email_validation . 'max:255|unique:' . $users_table,
            'password' => 'required|min:6|confirmed',
            'parrain' => ['nullable', 'exists:users,name'],
        ]);
    }

    protected function create(array $data)
{
    $user_model_fqn = config('backpack.base.user_model_fqn');
    $user = new $user_model_fqn();

    $createdUser = $user->create([
        'name'                             => $data['name'],
        backpack_authentication_column()   => $data[backpack_authentication_column()],
        'password'                         => bcrypt($data['password']),
        'parrain'                          => $data['parrain'] ?? null, // Ajoutez cette ligne
    ]);

    return $createdUser;
}


public function register(Request $request)
{
    if (!config('backpack.base.registration_open')) {
        abort(403, trans('backpack::base.registration_closed'));
    }

    // Validation des données
    $this->validator($request->all())->validate();

    // Récupération des données
    $data = $request->all();

    // Vérification si un parrain est présent
    if ($request->has('parrain')) {
        $data['parrain'] = $request->input('parrain');
    }

    // Création du nouvel utilisateur
    $user = $this->create($data);

    if (isset($data['parrain'])) {
        // Si un parrain est présent, associer le parrain au nouvel utilisateur
        $user->parrain = $data['parrain'];
        $user->save();

        // Mise à jour du parrain avec trophee1 + 500
        User::where('name', $data['parrain'])->update(['trophee1' => DB::raw('trophee1 + 500')]);

        // Mise à jour du nouvel utilisateur (parrainé) avec trophee1 + 1000
        $user->update(['trophee1' => DB::raw('trophee1 + 1000')]);
    } else {
        // Si pas de parrain, le nouvel utilisateur reste avec trophee1 + 0 (par défaut)
        $user->update(['trophee1' => DB::raw('trophee1 + 0')]);
    }

    // Événement d'enregistrement
    event(new Registered($user));

    // Connexion de l'utilisateur après l'enregistrement
    $this->guard()->login($user);

    // Redirection après inscription
    return redirect($this->redirectPath());
}


    protected function guard()
    {
        return backpack_auth();
    }

    public function showRegistrationForm()
    {
        return view('vendor.backpack.base.auth.register');
    }

    
}
