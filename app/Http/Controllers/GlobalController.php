<?php

namespace App\Http\Controllers;

use App\Models\Cadeaux;
use App\Models\Commandes;
use App\Models\Concours;
use App\Models\Gains;
use App\Models\Infosperso;
use App\Models\User;
use App\Models\Games;
use App\Models\Pages;
use App\Models\Packs;
use Carbon\Carbon;
use App\Models\Paiements;
use App\Models\Scores;
use Pestopancake\LaravelBackpackNotifications\Notifications\DatabaseNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $concours = Concours::All(); // TOUTES LES COMMANDES
        $winner = User::all(); //DERNIERS GAGNANTS JEUX
        
        // JOINT SCORE ET USERS POUR DERNIERS GAGNANTS PAGE JEUX
        $scores = Scores::select('scores.*', 'users.name')
        ->join('users', 'users.id', '=', 'scores.user_id')
        ->get();
        

$allgames = Games::orderBy('id', 'desc')
        ->get();
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
        ->first();
        return view('index', compact('scores', 'freegames', 'boostergames', 'starred', 'allgames', 'winner', 'concours'));
    }

    public function game(Request $request)
{
    if(backpack_auth()->check()){
        $userid = backpack_auth()->id();
        $username = backpack_auth()->user()->name;
        $rubis = backpack_auth()->user()->trophee2;
        $free = backpack_auth()->user()->global_score;
        $parties = backpack_auth()->user()->parties;
    } else {
        $userid = null;
        $username = null;
        $rubis = null;
        $free = null;
        $parties = null;
        return redirect('/');
    }
    
    $onegame = Games::where('id', $request->id)->get();

    $scores = Scores::where('game_id', $request->id)
             ->orderBy('id', 'desc')
             ->get();

    $game = $onegame[0];

    return view('game', compact('game', 'scores', 'userid', 'username', 'rubis', 'free', 'parties'));
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
    static function getGames()
    {
        $games1 = Games::where('type', 'Gratuit')->get();
        $games2 = Games::where('type', 'Booster')->get();
        $games = $games1->merge($games2);
        return $games;
    }

    public function winner()
    {
        $gains = Gains::all(); // récup tous les gains du concours
        //Selectionne le concours
        $concours = Concours::All()->last();
        //Score effectués ordre par id desc
        $scores = Scores::selectRaw('user_id, SUM(data) + SUM(data2*100) + SUM(data3*1000) AS total')
                ->where('game_id', $concours->game_id)
                ->groupBy('user_id')
                ->orderBy('total', 'desc')
                ->get();
        // Trouver la position de l'utilisateur dans le classement des scores
        $userPosition = 0;
        $userScore = null;
        for ($i = 0; $i < count($scores); $i++) {
            $score = $scores[$i];
            if($score && $score->user_id && auth()->user() && $score->user_id == auth()->user()->id) {
                $userPosition = $i + 1;
                $userScore = $score;
                $gain_nom = $gain->name;
                break;
            }
        }
        $position = $userPosition;
        $startdate = Carbon::createFromFormat('Y-m-d H:i:s', $concours->date_debut)->format('d/m H:i');
        $enddate = Carbon::createFromFormat('Y-m-d H:i:s', $concours->date_fin)->format('d/m H:i');
        $gain_id = 1;
    if($position == 1) {
        $gain_id = 1;
    } elseif($position == 2) {
        $gain_id = 2;
    } elseif($position == 3) {
        $gain_id = 3;
    } elseif($position > 3 && $position <= 6) {
        $gain_id = 4;
    } elseif($position > 6 && $position <= 15) {
        $gain_id = 5;
    } elseif($position > 15 && $position <= 30) {
        $gain_id = 6;
    } elseif($position > 30 && $position <= 150) {
        $gain_id = 7;
    } elseif($position > 150 && $position <= 300) {
        $gain_id = 8;
    } elseif($position > 300 && $position <= 600) {
        $gain_id = 9;
    } elseif($position > 600 && $position <= 1500) {
        $gain_id = 10;
    } elseif($position > 1500 && $position <= 3000) {
        $gain_id = 11;
    } else {
        $gain_id = 12;
    }
    $gain = $gains->where('id', $gain_id)->first();
    $gain_nom = $gain ? $gain->name : null;
    return view('winner', compact('gain_nom', 'gain', 'gains', 'position', 'scores', 'concours', 'startdate', 'enddate', 'gain_nom'));
}


    public function store()
    {
        $concours = Concours::All();
        $cadeaux = Cadeaux::all();
        return view('store', compact('cadeaux', 'concours'));
    }

    public function search(Request $request)
    {
       
        $q = request()->input('q');
        if ($request->filled('q')) {
        $cadeaux = Cadeaux::where('name', 'like', '%' . $q . '%')->get();
        } else {
            $cadeaux = Cadeaux::all();
        }
        if ($request->filled('category')) {
            if ($request->filled('category')) {
            $cadeaux = Cadeaux::where('category', $request->category)->get();
        } else {
            $cadeaux = Cadeaux::all();
        }
    }
        return view('store', compact('cadeaux'));
    }
  

    public function pack()
    {
        $packs = Packs::where('active', 'Oui')->get();
        return view('pack', compact('packs'));
    }

    public function rules()
    {
        return view('rules');
    }

    public function help()
    {
        return view('help');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactus()
    {
        return view('contactus');
    }

    public function aide()
    {
        return view('aide');
    }

    public function test()
    {
       $test = encrypt(time());
       $decrypted = decrypt('eyJpdiI6IklKdTMvTEVKa1FRbEJkTzkxTHFPd0E9PSIsInZhbHVlIjoiV09JUy9Eak4yRG9kODQ4WitFa1AxRzNmVXdPV0xDTjQ1a0N2NGJpZUt1UjFCSDFNK05PYndQelRUczFmK2xWemdsV1Brc2t2eVNEM0NNcEFueGwrek9lRjVqR2cyYkkrbmpGWUZOVmYwUmxUWExHLzVtQWkwZmRMN21RbjZUN0pMZ3AxWXk4aTlTbmtuRjVZb01vL0hQSWxUSkZPM2ZEUzRlT3YyOFV0VmZTV0diZ3BWVEhrYTkybEtnRkd1VlY5cDhSSDBJaDRVM1I5Y2hLRS9uWGpaWVpIWlVSZFA4N05LS0RyUWg5M05QSVU5am9Hd3FwWk9Nbm82RTljYStsOCIsIm1hYyI6Ijg4MTM1ZDczZDIzMTQyYzkzN2IzOGM1YjE1NjRlN2VmYWVjMTA0MTk2ZDA4N2E4NDI5N2Q1NTQwNjY0ZDg2M2YiLCJ0YWciOiIifQ==');
       dd($decrypted['gameid']);
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
            $concours = Concours::first(); // TOUTES LES COMMANDES
            $idjoueur= backpack_auth()->user()->id;
            $usermail = backpack_auth()->user()->email;
            $userid = backpack_auth()->user()->id;
            $scores = Scores::where('user_id', $userid)
                ->orderBy('id', 'desc')
                ->limit('100')
                ->get();
            $orders = Commandes::where('user_id', $userid)
                ->latest()
                ->limit('6')
                ->get();
            $infos = Infosperso::where('user_id', $userid)->get();
            $paiements = Paiements::where('user_id', $userid)
                ->latest()
                ->limit('6')
                ->get();
                $scory = Scores::selectRaw('user_id, SUM(data) + SUM(data2*100) + SUM(data3*1000) AS total')
                ->where('user_id', $idjoueur)
                ->where('game_id', $concours->game_id)
                ->groupBy('user_id')
                ->limit('1')
                ->first();

            
            return view(
                'profil',
                compact('concours', 'idjoueur', 'scory', 'scores', 'orders', 'infos', 'paiements')
            );
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
            $order->status = 'Oui';
            $order->prix = $request->prix;
            $order->save();
            $scores = Scores::where('user_id', $userid)->get();
            if (backpack_auth()->user()->trophee1 >= $request->price) {
                backpack_auth()
                    ->user()
                    ->update([
                        'trophee1' =>
                            backpack_auth()->user()->trophee1 -
                            $request->price,
                    ]);
                Commandes::where('user_id', $userid)
                    ->where('id', $request->id)
                    ->update(['status' => 'Oui']);
            } else {
                return back();
            }
            $orders = Commandes::where('user_id', $userid)
                ->latest()
                ->limit('6')
                ->get();
            $paiements = Paiements::where('user_id', $userid)
                ->latest()
                ->limit('6')
                ->get();
            $infos = Infosperso::where('user_id', $userid)->get();
             //create notification
             $admin = backpack_user()->find(1);
             $admin->notify(
                 new DatabaseNotification(
                     ($type = 'success'), // info / success / warning / error
                     ($message = 'Nouvelle commande'),
                     ($messageLong = 'Nouvelle commande de cadeau par ' . $usermail),
                     // rand(1, 99999)), // optional
                     ($href = '/admin/commandes'), // optional, e.g. backpack_url('/example')
                     ($hrefText = 'Voir') // optional
                 )
             );
            return view(
                'profil',
                compact('scores', 'orders', 'infos', 'paiements')
            );
        } else {
            return redirect('/');
        }
    }

    public function setOrderpack(Request $request)
    {
        if (backpack_auth()->check()) {
            $usermail = backpack_auth()->user()->email;
            $userid = backpack_auth()->user()->id;
            $paiement = new Paiements();
            $paiement->pack_id = $request->pack_id;
            $paiement->user_id = $userid;
            $paiement->status = 'Oui';
            $paiement->type = $request->pack_price;
            $paiement->name = $request->transaction;
            $paiement->save();
            if ($request->type == 'Rubis'){
                backpack_auth()
                ->user()
                ->update([
                    'trophee2' =>
                        backpack_auth()->user()->trophee2 + $request->gain,
                ]);
            } else if ($request->type == 'Diamants'){
            backpack_auth()
                ->user()
                ->update([
                    'trophee1' =>
                        backpack_auth()->user()->trophee1 + $request->gain,
                ]);
            } else if ($request->type == 'Coins'){
            backpack_auth()
                ->user()
                ->update([
                    'trophee3' =>
                        backpack_auth()->user()->trophee3 + $request->gain,
                ]);
            }
            $scores = Scores::where('user_id', $userid)->get();
            $orders = Commandes::where('user_id', $userid)
                ->latest()
                ->limit('6')
                ->get();
            $infos = Infosperso::where('user_id', $userid)->get();
            $paiements = Paiements::where('user_id', $userid)
                ->latest()
                ->limit('6')
                ->get();

            //create notification
            $admin = backpack_user()->find(1);
            $admin->notify(
                new DatabaseNotification(
                    ($type = 'success'), // info / success / warning / error
                    ($message = 'Nouveau paiement'),
                    ($messageLong = 'Nouveau paiement paypal de ' . $usermail),
                    // rand(1, 99999)), // optional
                    ($href = '/admin/paiements'), // optional, e.g. backpack_url('/example')
                    ($hrefText = 'Voir') // optional
                )
            );

            return view(
                'profil',
                compact('scores', 'orders', 'infos', 'paiements')
            )->with('success', 'ok');
        } else {
            return redirect('/');
        }
    }

    public function confirmOrderpack(Request $request)
    {
        if (backpack_auth()->check()) {
            $usermail = backpack_auth()->user()->email;
            $userid = backpack_auth()->user()->id;
            Paiements::where('user_id', $userid)
                ->where('id', $request->id)
                ->update(['status' => 'Oui']);
            $scores = Scores::where('user_id', $userid)->get();
            // substrate diamonds
            $orders = Commandes::where('user_id', $userid)
                ->latest()
                ->limit('6')
                ->get();
            $paiements = Paiements::where('user_id', $userid)
                ->latest()
                ->limit('6')
                ->get();
            $infos = Infosperso::where('user_id', $userid)->get();
            //create notification
            $admin = backpack_user()->find(1);
            $admin->notify(
                new DatabaseNotification(
                    ($type = 'success'), // info / success / warning / error
                    ($message = 'Nouvelle Commande'),
                    ($messageLong =
                        'Nouvelle Commande en attente de validation: ' .
                        $usermail),
                    // rand(1, 99999)), // optional
                    ($href = '/admin/commandes'), // optional, e.g. backpack_url('/example')
                    ($hrefText = 'Voir') // optional
                )
            );

            return back();
        } else {
            return redirect('/');
        }
    }

    public function confirmOrder(Request $request)
    {
        if (backpack_auth()->check()) {
            $usermail = backpack_auth()->user()->email;
            $userid = backpack_auth()->user()->id;
            $scores = Scores::where('user_id', $userid)->get();
            //substrate diamonds from global score
            if (backpack_auth()->user()->trophee1 >= $request->price) {
                backpack_auth()
                    ->user()
                    ->update([
                        'trophee1' =>
                            backpack_auth()->user()->trophee1 -
                            $request->price,
                    ]);
                Commandes::where('user_id', $userid)
                    ->where('id', $request->id)
                    ->update(['status' => 'Oui']);
            } else {
                return back();
            }
            $orders = Commandes::where('user_id', $userid)
                ->latest()
                ->limit('6')
                ->get();
            $paiements = Paiements::where('user_id', $userid)
                ->latest()
                ->limit('6')
                ->get();
            $infos = Infosperso::where('user_id', $userid)->get();

            //create notification
            $admin = backpack_user()->find(1);
            $admin->notify(
                new DatabaseNotification(
                    ($type = 'success'), // info / success / warning / error
                    ($message = 'Nouvelle Commande'),
                    ($messageLong =
                        'Nouvelle Commande passé par: ' . $usermail),
                    // rand(1, 99999)), // optional
                    ($href = '/admin/commandes'), // optional, e.g. backpack_url('/example')
                    ($hrefText = 'Voir') // optional
                )
            );
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
                $paiements = Paiements::where('user_id', $userid)->get();
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
                $orders = Commandes::where('user_id', $userid)
                    ->latest()
                    ->limit('6')
                    ->get();
                $infos = Infosperso::where('user_id', $userid)->get();
                $paiements = Paiements::where('user_id', $userid)
                    ->latest()
                    ->limit('6')
                    ->get();
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
            $orders = Commandes::where('user_id', $userid)
                ->latest()
                ->limit('6')
                ->get();
            $paiements = Paiements::where('user_id', $userid)
                ->latest()
                ->limit('6')
                ->get();
            $infos = Infosperso::where('user_id', $userid)->get();
            return view(
                'profil',
                compact('scores', 'orders', 'infos', 'paiements')
            );
        } else {
            return redirect('/');
        }
    }

    public function deleteOrderpack(Request $request)
    {
        if (backpack_auth()->check()) {
            $usermail = backpack_auth()->user()->email;
            $userid = backpack_auth()->user()->id;
            Paiements::where('user_id', $userid)
                ->where('id', $request->id)
                ->delete();
            $scores = Scores::where('user_id', $userid)->get();
            $orders = Commandes::where('user_id', $userid)
                ->latest()
                ->limit('6')
                ->get();
            $paiements = Paiements::where('user_id', $userid)
                ->latest()
                ->limit('6')
                ->get();
            $infos = Infosperso::where('user_id', $userid)->get();
            return view(
                'profil',
                compact('scores', 'orders', 'infos', 'paiements')
            );
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
        //$request->session()->invalidate();
        return redirect('/');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        //$request->session()->invalidate();
        return view('index');
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

    static function getSommeDiamants()
    {
       $sommediamants = User::All()->sum('trophee1');
        return number_format($sommediamants, 0, ',', ' ');
    }

    static function getSommeRubis()
    {
       $sommerubis = User::All()->sum('trophee2');
        return number_format($sommerubis, 0, ',', ' ');
    }

    static function getSommeCoins()
    {
       $sommecoins = User::All()->sum('trophee3');
        return number_format($sommecoins, 0, ',', ' ');
    }

    static function isMobile(): bool
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $mobileAgents = [
            'Android',
            'iPhone',
            'iPod',
            'BlackBerry',
            'Windows Phone',
            'Opera Mini',
            'IEMobile',
            'Mobile Safari'
        ];

        foreach ($mobileAgents as $agent) {
            if (stripos($userAgent, $agent) !== false) {
                return true;
            }
        }

        return false;
    }
}
