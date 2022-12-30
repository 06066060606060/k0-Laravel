<?php

namespace App\Http\Controllers;

use App\Models\Cadeaux;
use App\Models\Commandes;
use App\Models\Infosperso;
use App\Models\User;
use App\Models\Games;
use App\Models\Pages;
use App\Models\Packs;
use App\Models\Scores;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GlobalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $freegames = Games::where('type', 'Gratuit')
            ->where('status', 0)
            ->limit(6)
            ->inRandomOrder()
            ->get();
        $boostergames = Games::where('type', 'Booster')
            ->limit(6)
            ->inRandomOrder()
            ->get();
        $starred = Games::where('status', 1)
            ->inRandomOrder()
            ->get();
        $starred = $starred[0];
        return view('index', compact('freegames', 'boostergames', 'starred'));
    }

    public function game(Request $request)
    {
        $onegame = Games::where('id', $request->id)->get();
        $scores = Scores::where('game_id', $request->id)->get();
        $game = $onegame[0];

        return view('game', compact('game', 'scores'));
    }

    static function pages()
    {
        $pages = Pages::all();
        return $pages;
    }

    static function starred()
    {
        $starred = Games::where('status', 1)
            ->inRandomOrder()
            ->get();
        return $starred;
    }

    public function games()
    {
        $freegames = Games::where('type', 'Gratuit')
            ->inRandomOrder()
            ->get();
        $boostergames = Games::where('type', 'Booster')
            ->inRandomOrder()
            ->get();
        return view('allgames', compact('freegames', 'boostergames'));
    }

    public function winner()
    {
        $scores = Scores::all();
        return view('winner', compact('scores'));
    }

    public function store()
    {
        $cadeaux = Cadeaux::all();
        return view('store', compact('cadeaux'));
    }

    public function pack()
    {
        $packs = Packs::where('id', '!=',  1)->where('id', '!=', 2)->get();
        return view('pack', compact('packs'));
    }

    public function help()
    {
        return view('help');
    }

    static function version()
    {
        $filename = '../public/build/manifest.json';
        // $ver = date('d/m/y H:i', filemtime($filename) + 3600);
        $ver = '1.1.0';
        $version = $ver;
        return $version;
    }

    public function getProfil()
    {
        if (backpack_auth()->check()) {
            $usermail = backpack_auth()->user()->email;
            $userid = backpack_auth()->user()->id;
            $scores = Scores::where('user_id', $userid)
                ->latest()
                ->limit('6')
                ->get();
            $orders = Commandes::where('user_id', $userid)
                ->latest()
                ->limit('6')
                ->get();
            $infos = Infosperso::where('user_id', $userid)->get();
            return view('profil', compact('scores', 'orders', 'infos'));
        } else {
            return redirect('/');
        }
    }

    public function setOrder(Request $request)
    {
        if (backpack_auth()->check()) {
            $usermail = backpack_auth()->user()->email;
            $userid = backpack_auth()->user()->id;
            $order = new Commandes();
            $order->cadeau_id = $request->id;
            $order->user_id = $userid;
            $order->status = 'Non';
            $order->prix = $request->prix;
            $order->save();
            $scores = Scores::where('user_id', $userid)->get();
            $orders = Commandes::where('user_id', $userid)->get();
            return view('profil', compact('scores', 'orders'));
        } else {
            return redirect('/');
        }
    }

    public function confirmOrder(Request $request)
    {
        if (backpack_auth()->check()) {
            $usermail = backpack_auth()->user()->email;
            $userid = backpack_auth()->user()->id;
            Commandes::where('user_id', $userid)
                ->where('id', $request->id)
                ->update(['status' => 'Oui']);
            $scores = Scores::where('user_id', $userid)->get();
            // substrate diamonds
            $orders = Commandes::where('user_id', $userid)->get();
            return back();
        } else {
            return redirect('/');
        }
    }

    public function saveAddress(Request $request)
    {
        if (backpack_auth()->check()) {
            $usermail = backpack_auth()->user()->email;
            $userid = backpack_auth()->user()->id;
            if (Infosperso::where('user_id', $userid)->exists()) {
                Infosperso::where('user_id', $userid)->update([
                    'nom' => $request->lastname,
                    'prenom' => $request->firstname,
                    'adresse' => $request->address,
                    'codepostal' => $request->zip,
                    'ville' => $request->city,
                    
                ]);
                return back();
            } else {
                $infos = new Infosperso();
                $infos->nom = $request->lastname;
                $infos->prenom = $request->firstname;
                $infos->user_id = $request->user_id;
                $infos->adresse = $request->address;
                $infos->codepostal = $request->zip;
                $infos->ville = $request->city;
                $infos->save();
                $scores = Scores::where('user_id', $userid)->get();
                $orders = Commandes::where('user_id', $userid)->get();
                $infos = Infosperso::where('user_id', $userid)->get();
                return back();
            }
        } else {
            return redirect('/');
        }
    }

    public function deleteOrder(Request $request)
    {
        if (backpack_auth()->check()) {
            $usermail = backpack_auth()->user()->email;
            $userid = backpack_auth()->user()->id;
            Commandes::where('user_id', $userid)
                ->where('id', $request->id)
                ->delete();
            $scores = Scores::where('user_id', $userid)->get();
            $orders = Commandes::where('user_id', $userid)->get();
            return view('profil', compact('scores', 'orders'));
        } else {
            return redirect('/');
        }
    }

    public function deleteUser(Request $id)
    {
        $thisuser = User::where('id', $id)->get();
        $thisuser[0]->delete();
        Session::flush();
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }

    static function getUsers()
    {
        //retrive all users
        $users = User::all();
        return $users;
    }

    static function getSessions()
    {
        //retrive all users
        $users_session = Session::all();
        return $users_session;
    }

    static function getLegal()
    {
        return view('legal');
    }

    static function getConf()
    {
        return view('confidentialite');
    }
}
