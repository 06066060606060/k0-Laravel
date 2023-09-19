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

    $this->validator($request->all())->validate();

    $data = $request->all();

    if ($request->has('parrain')) {
        $data['parrain'] = $request->input('parrain');
    }

    $user = $this->create($data);

    if (isset($data['parrain'])) {
        $user->parrain = $data['parrain'];
        $user->save();
        User::where('name', $data['parrain'])->update(['trophee2' => DB::raw('trophee2 + 1')]);
    }

    event(new Registered($user));
    $this->guard()->login($user);

    <script>
    gtag('event', 'conversion', {'send_to': 'AW-11338958296/WdlMCMb3mOMYENiL654q'});
    </script>

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
