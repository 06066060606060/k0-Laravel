<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Mail;
use App\Mail\AboMail;
use Pestopancake\LaravelBackpackNotifications\Notifications\DatabaseNotification;

class CheckIfAdmin
{
    private function checkIfUserIsAdmin($user, $request)
    {
        //$parrain = $request->input('parrain');
        if ($user->role == 'admin') {
            // dd('admin');
            return true;
        } elseif ($user->role == 'user') {
            //$user->role = 'user'; 
            //$user->parties = '10';
            //$user->trophee1 = '150';
         //   $user->parrain = $parrain; // On offre 150 diamants
         
            $user->save();

            //create notification
            $admin = backpack_user()->where('role', 'admin')->first();
            
            return true;
        } elseif ($user->role == 'user') {
            // dd('user');
            return true;
        }
    }

    private function respondToUnauthorizedRequest($request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            return response(trans('backpack::base.unauthorized'), 401);
        } else {
            return redirect()->guest(backpack_url('login'));
        }
    }

    public function handle($request, Closure $next)
    {
        if (backpack_auth()->guest()) {
            return $this->respondToUnauthorizedRequest($request);
        }

        if (!$this->checkIfUserIsAdmin(backpack_user(), $request)) {
            return $this->respondToUnauthorizedRequest($request);
        }

        return $next($request);
    }
}

