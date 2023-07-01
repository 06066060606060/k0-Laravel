<?php

namespace App\Http\Controllers;

use App\Models\Cadeaux;
use App\Models\Commandes;
use App\Models\Concours;
use App\Models\Derniers_Gagnants_Concours;
use App\Models\Gains;
use App\Models\Infosperso;
use App\Models\User;
use App\Models\Games;
use App\Models\Pages;
use App\Models\Packs;
use Carbon\Carbon;
use App\Models\Paiements;
use App\Models\Scores;
use App\Models\ScoresConcours;
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

    $isMobile = $this->isMobile();

     public function getAll()
    {
        $concours = Concours::all(); // TOUTES LES COMMANDES
        
        $winner = User::latest()->get(); //DERNIERS GAGNANTS JEUX
        
        $lejoueur = null;
        $count = 0;
        
        if (backpack_auth()->check() && backpack_auth()->user()) {
            $lejoueur = backpack_auth()->user()->name;
            $count = User::where('parrain', backpack_auth()->user()->name)->count();
        }
        
        // JOINT SCORE ET USERS POUR DERNIERS GAGNANTS PAGE JEUX
        $scores = Scores::select('scores.*', 'users.name')->join('users', 'users.id', '=', 'scores.user_id')->get();
        
        // Tous les jeux
        $allgames = Games::whereNotIn('type', ['Event', 'Solo'])->orderBy('id', 'desc')->get();
        
        // Jeux Gratuits
        $freegames = Games::where('type', 'Gratuit')->where('status', 0)->limit(6)->inRandomOrder()->get();
        
        // Jeux Booster
        $boostergames = Games::where('type', 'Booster')->limit(6)->inRandomOrder()->get();
        
        // Jeux Solo
        $sologames = Games::where('type', 'Solo')->limit(6)->orderBy('id', 'asc')->get();
        
        // Jeux event
        $eventsgames = Games::where('type', 'Event')->get();
        $countevent = Games::where('type', 'Event')->where('status', 1)->count();
        
        // Jeux mis en avant
        $starred = Games::where('status', 1)->inRandomOrder()->first();
        
        if ($isMobile == true) {
            return view('index_amp', compact('count', 'lejoueur', 'scores', 'freegames', 'sologames', 'boostergames', 'eventsgames', 'countevent', 'starred', 'allgames', 'winner', 'concours'));
        } else {
            return view('index', compact('count', 'lejoueur', 'scores', 'freegames', 'sologames', 'boostergames', 'eventsgames', 'countevent', 'starred', 'allgames', 'winner', 'concours'));
        }
    }
        
/////////////////////////////////////////////////////////////////////////////////////////////////////

    // Fonction quand un joueur clique sur un jeu
    public function game(Request $request)
    {
    if(backpack_auth()->check()){ // loggué
        $userid = backpack_auth()->id(); // retourne l'id
        $username = backpack_auth()->user()->name; // retourne le pseudo
        $rubis = backpack_auth()->user()->trophee2; // retourne les rubis
        $free = backpack_auth()->user()->global_score; // retourne le score total
        $parties = backpack_auth()->user()->parties; // retourne les parties
    } else {
        // Sinon tout et null et on redirige à l'accueil
        $userid = null;
        $username = null;
        $rubis = null;
        $free = null;
        $parties = null;
        return redirect('/');
    }
    
    // Selectionne le jeu auquel le membre joue
    $onegame = Games::where('id', $request->id)->get();
    // Sélectionne les scores du jeu en cours
    $scores = Scores::where('game_id', $request->id)->orderBy('id', 'desc')->take(17)->get();
    //Le jeu s'affiche 
    $game = $onegame[0];

    return view('game', compact('game', 'scores', 'userid', 'username', 'rubis', 'free', 'parties'));
}
/////////////////////////////////////////////////////////////////////////////////////////////////////

    // Fonction qui retourne les pages crées en administration
    static function pages()
    {
        $pages = Pages::all();
        return $pages;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////

    // Fonction qui retourne les jeux mis en avant 
    static function starred()
    {
        $starred = Games::where('status', 1)->inRandomOrder()->get();
        return $starred;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////

    // Fonction qui retourne les jeux
    public function games()
    {
        $freegames = Games::where('type', 'Gratuit')->inRandomOrder()->get(); // Gratuits
        $boostergames = Games::where('type', 'Booster')->inRandomOrder()->get(); // Booster
        return view('allgames', compact('freegames', 'boostergames'));
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////

    // Fonction qui retourne tout type jeu mélangés 
    static function getGames()
    {
        $games1 = Games::where('type', 'Gratuit')->get(); // Gratuits
        $games2 = Games::where('type', 'Booster')->get(); // Boosters
        $games3 = Games::where('type', 'Event')->get(); // Gratuits
        $games4 = Games::where('type', 'Solo')->get(); // Gratuits
        $games = $games1->merge($games2)->merge($games3)->merge($games4); // Fusion de toutes les collections
        return $games;        
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////

    // Fonction du concours
    public function winner()
    {
        $gains = Gains::all(); // récup tous les gains du concours
        $concours = Concours::All()->last(); //Selectionne le concours
        $lesscoresdeconcours = ScoresConcours::where('game_id', $concours->game_id)->count();
        $derniers_gagnants_concours = Derniers_Gagnants_Concours::All()->last(); //Selectionne le dernier gagnant concours
        $lesderniers_gagnants_concours = Derniers_Gagnants_Concours::All(); //Selectionne tous les gagnants concours
        $now = Carbon::now(); // Vérifie si date actuelle est après date de fin du concours
        
        //Score effectués ordre par id desc
        if ($concours->active == 1) {
            Derniers_Gagnants_Concours::query()->delete();
            $scoresconcours = ScoresConcours::selectRaw('id_user, SUM(score) AS total')
                ->where('game_id', $concours->game_id) // ou id du jeu = au jeu du concours
                ->groupBy('id_user') // groupé par id users
                ->orderBy('total', 'desc') // ordre par score total plus grand au plus petit 
                ->get(); // récupère le résultat
            
            // Trouver la position de l'utilisateur dans le classement des scores
            $userPosition = 0; // défini la position à 0
            $userScore = null; // défini un score vierge
            for ($i = 0; $i < count($scoresconcours); $i++) {
                $score = $scoresconcours[$i];
                if ($score && $score->id_user && auth()->user() && $score->id_user == auth()->user()->id) {
                    $userPosition = $i + 1;
                    $userScore = $score;
                    break;
                }
            }
            
            $position = $userPosition;
            $startdate = Carbon::createFromFormat('Y-m-d H:i:s', $concours->date_debut)->format('d/m H:i');
            $enddate = Carbon::createFromFormat('Y-m-d H:i:s', $concours->date_fin)->format('d/m H:i');
            $gain_id = 1;
            
            if ($position == 1) {
                $gain_id = 1;
            } elseif ($position == 2) {
                $gain_id = 2;
            } elseif ($position == 3) {
                $gain_id = 3;
            } elseif ($position > 3 && $position <= 6) {
                $gain_id = 4;
            } elseif ($position > 6 && $position <= 15) {
                $gain_id = 5;
            } elseif ($position > 15 && $position <= 30) {
                $gain_id = 6;
            } elseif ($position > 30 && $position <= 150) {
                $gain_id = 7;
            } elseif ($position > 150 && $position <= 300) {
                $gain_id = 8;
            } elseif ($position > 300 && $position <= 600) {
                $gain_id = 9;
            } elseif ($position > 600 && $position <= 1500) {
                $gain_id = 10;
            } elseif ($position > 1500 && $position <= 3000) {
                $gain_id = 11;
            } else {
                $gain_id = 12;
            }

            $gain = $gains->where('id', $gain_id)->first();
            $gain_nom = $gain ? $gain->name : null;

            if ($now->gt($concours->date_fin)) {
                // Récupère users selon le score et position
                $scores_sorted = $scoresconcours->sortByDesc('score'); // Tri par ordre décroissant de score
                $users = User::whereIn('id', $scores_sorted->pluck('id_user'))->get();
                
                // Boucle pour la distribution
                foreach ($users as $user) {
                    $user_position = $scores_sorted->search(function ($score) use ($user) {
                        return $score->id_user === $user->id;
                    });
                    
                    if ($user_position !== false) {
                        // Déterminer l'identifiant du gain en fonction de la position
                        if ($user_position == 0) {
                            $gain_id = 1;
                        } elseif ($user_position == 1) {
                            $gain_id = 2;
                        } elseif ($user_position == 2) {
                            $gain_id = 3;
                        } elseif ($user_position > 2 && $user_position <= 5) {
                            $gain_id = 4;
                        } elseif ($user_position > 5 && $user_position <= 14) {
                            $gain_id = 5;
                        } elseif ($user_position > 14 && $user_position <= 29) {
                            $gain_id = 6;
                        } elseif ($user_position > 29 && $user_position <= 149) {
                            $gain_id = 7;
                        } elseif ($user_position > 149 && $user_position <= 299) {
                            $gain_id = 8;
                        } elseif ($user_position > 299 && $user_position <= 599) {
                            $gain_id = 9;
                        } elseif ($user_position > 599 && $user_position <= 1499) {
                            $gain_id = 10;
                        } elseif ($user_position > 1499 && $user_position <= 2999) {
                            $gain_id = 11;
                        } else {
                            $gain_id = 12;
                        }
                        
                        // Obtenir le gain correspondant à l'identifiant
                        $gain = $gains->where('id', $gain_id)->first();
                        
                        // Ajouter le gain à l'utilisateur en fonction de son type
                        switch ($gain->type) {
                            case 'Diamants':
                                $user->trophee1 += $gain->name;
                                break;
                            case 'Rubis':
                                $user->trophee2 += $gain->name;
                                break;
                            case 'Coins':
                                $user->trophee3 += $gain->name;
                                break;
                        }
                        // Ajoute les nouveaux derniers gagnants
                        $dernier_gagnant = new Derniers_Gagnants_Concours;
                        $dernier_gagnant->name = $user->name;
                        if (isset($user->scores)) {
                            $dernier_gagnant->score = $user->scores->sum(function ($score) {
                                return $score->data + ($score->data2 * 100) + ($score->data3 * 1000);
                            });
                        } else {
                            $dernier_gagnant->score = 0;
                        }
                        $dernier_gagnant->gain = $gain->name;
                        $dernier_gagnant->type = $gain->type;
                        $dernier_gagnant->date_gain = $now;
                        $dernier_gagnant->created_at = $now;
                        $dernier_gagnant->updated_at = $now;
                        $dernier_gagnant->save();
                        
                        // Enregistrer les modifications de l'utilisateur
                        $user->save();
                    }
                }
                // Désactive le concours en cours
                Concours::where('id', 10)->update(['active' => 0]);
                // Supprime tous les scores concours
                ScoresConcours::query()->delete();
            }
            return view('winner', compact('lesderniers_gagnants_concours', 'derniers_gagnants_concours', 'gain_nom', 'gain', 'gains', 'position', 'scoresconcours', 'concours', 'startdate', 'enddate', 'gain_nom', 'lesscoresdeconcours'));
        } else {
            return view('winner', compact('lesderniers_gagnants_concours'));
        }
    }
    
    public function store()
    {
        $concours = Concours::All();
        $cadeaux = Cadeaux::orderBy('prix', 'asc')->get();
        return view('store', compact('cadeaux', 'concours'));
    }

    public function search(Request $request)
    {
       
        $q = request()->input('q');
        if ($request->filled('q')) {
        $cadeaux = Cadeaux::where('name', 'like', '%' . $q . '%')->get();
        } else {
            $cadeaux = Cadeaux::orderBy('prix', 'asc')->get();
        }
        if ($request->filled('category')) {
            if ($request->filled('category')) {
                $cadeaux = Cadeaux::where('category', $request->category)
                ->orderBy('prix', 'asc')
                ->get();

        } else {
            $cadeaux = Cadeaux::orderBy('prix', 'asc')->get();
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

    public function discord()
    {
        return view('discord');
    }

    public function partenaires()
    {
        return view('partenaires');
    }

    public function reglement()
    {
        return view('reglement');
    }

    public function mentionslegales()
    {
        return view('mentions-legales');
    }

    public function confidentialitesite()
    {
        return view('confidentialite-site');
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
            $leparrain= backpack_auth()->user()->parrain;
            $leparrainne= backpack_auth()->user()->name;
            $joueursParraines = User::where('parrain', $leparrainne)->get();
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
            $scory = null;
            if ($concours != null && $concours->game_id != null) {    
                $scory = ScoresConcours::selectRaw('id_user, SUM(score) AS total')
                ->where('id_user', $idjoueur)
                ->where('game_id', $concours->game_id)
                ->groupBy('id_user')
                ->limit('1')
                ->first();
            }
            
            return view(
                'profil',
                compact('leparrainne', 'leparrain', 'concours', 'idjoueur', 'scory', 'scores', 'orders', 'infos', 'paiements', 'joueursParraines')
            );
        } else {
            return redirect('/');
        }
    }
    // achat en boutique lorsque le joueur confirme sa commande en boutique
    public function setOrder(Request $request)
    {
        if (backpack_auth()->check()) {
            $usermail = backpack_auth()->user()->email;
            $userid = backpack_auth()->user()->id;
            $leparrain= backpack_auth()->user()->parrain;
            $leparrainne= backpack_auth()->user()->name;
            $joueursParraines = User::where('parrain', $leparrainne)->get();
            $order = new Commandes();
            $order->cadeau_id = $request->id;
            $order->user_id = $userid;
            
            $validNames = [
                '1 Rubis', '1 Rubin', '1 Ruby', '1 Rubí', '1 Rubino',
                '2 Rubis', '2 Rubine', '2 Rubies', '2 Rubíes', '2 Rubini',
                '10 Rubis', '10 Rubine', '10 Rubies', '10 Rubíes', '10 Rubini',
                '20 Rubis', '20 Rubine', '20 Rubies', '20 Rubíes', '20 Rubini'
            ];
            
            if (in_array($request->name, $validNames)) {
                $order->status = 'Envoyé';
            } else {
                $order->status = 'Oui';
            }
            
            if ($request->input('prix-type') == 'diamond') { // si le paiement est fait via diamants
                $order->prix = $request->price;
            } elseif ($request->input('prix-type') == 'coin') { // si le paiement est fait via coins
                $order->prix_coins = $request->price_coins;
            }
            
            $order->save();
            $scores = Scores::where('user_id', $userid)->get();
            
            if ($request->input('prix-type') == 'diamond') { // si le paiement est fait via diamants
                if (in_array($request->name, ['1 Rubis', '1 Rubin', '1 Ruby', '1 Rubí', '1 Rubino'])) {
                    backpack_auth()->user()->update([
                        'trophee1' => backpack_auth()->user()->trophee1 - $request->price,
                        'trophee2' => backpack_auth()->user()->trophee2 + 1,
                    ]);
                } elseif (in_array($request->name, ['2 Rubis', '2 Rubine', '2 Rubies', '2 Rubíes', '2 Rubini'])) {
                    backpack_auth()->user()->update([
                        'trophee1' => backpack_auth()->user()->trophee1 - $request->price,
                        'trophee2' => backpack_auth()->user()->trophee2 + 2,
                    ]);
                } elseif (in_array($request->name, ['10 Rubis', '10 Rubine', '10 Rubies', '10 Rubíes', '10 Rubini'])) {
                    backpack_auth()->user()->update([
                        'trophee1' => backpack_auth()->user()->trophee1 - $request->price,
                        'trophee2' => backpack_auth()->user()->trophee2 + 10,
                    ]);
                } elseif (in_array($request->name, ['20 Rubis', '20 Rubine', '20 Rubies', '20 Rubíes', '20 Rubini'])) {
                    backpack_auth()->user()->update([
                        'trophee1' => backpack_auth()->user()->trophee1 - $request->price,
                        'trophee2' => backpack_auth()->user()->trophee2 + 20,
                    ]);
                } else {
                    backpack_auth()->user()->update([
                        'trophee1' => backpack_auth()->user()->trophee1 - $request->price,
                    ]);
                }
            } elseif ($request->input('prix-type') == 'coin') { // si le paiement est fait via coins
                if (backpack_auth()->user()->trophee3 >= $request->price_coins) {
                    if (in_array($request->name, ['1 Rubis', '1 Rubin', '1 Ruby', '1 Rubí', '1 Rubino'])) {
                        backpack_auth()->user()->update([
                            'trophee3' => backpack_auth()->user()->trophee3 - $request->price_coins,
                            'trophee2' => backpack_auth()->user()->trophee2 + 1,
                        ]);
                    } elseif (in_array($request->name, ['2 Rubis', '2 Rubine', '2 Rubies', '2 Rubíes', '2 Rubini'])) {
                        backpack_auth()->user()->update([
                            'trophee3' => backpack_auth()->user()->trophee3 - $request->price_coins,
                            'trophee2' => backpack_auth()->user()->trophee2 + 2,
                        ]);
                    } elseif (in_array($request->name, ['10 Rubis', '10 Rubine', '10 Rubies', '10 Rubíes', '10 Rubini'])) {
                        backpack_auth()->user()->update([
                            'trophee3' => backpack_auth()->user()->trophee3 - $request->price_coins,
                            'trophee2' => backpack_auth()->user()->trophee2 + 10,
                        ]);
                    } elseif (in_array($request->name, ['20 Rubis', '20 Rubine', '20 Rubies', '20 Rubíes', '20 Rubini'])) {
                        backpack_auth()->user()->update([
                            'trophee3' => backpack_auth()->user()->trophee3 - $request->price_coins,
                            'trophee2' => backpack_auth()->user()->trophee2 + 20,
                        ]);
                    } else {
                        backpack_auth()->user()->update([
                            'trophee3' => backpack_auth()->user()->trophee3 - $request->price_coins,
                        ]);
                    }
                } else {
                    return back();
                }
            }
            
            Commandes::where('user_id', $userid)
                ->where('id', $request->id)
                ->update(['status' => 'Oui']);
            
            $orders = Commandes::where('user_id', $userid)
                ->latest()
                ->limit(6)
                ->get();
            
            $paiements = Paiements::where('user_id', $userid)
                ->latest()
                ->limit(6)
                ->get();
            
            $infos = Infosperso::where('user_id', $userid)->get();
            
            // create notification
            $admin = backpack_user()->find(1);
            if (isset($admin)) {
                $admin->notify(
                    new DatabaseNotification(
                        $type = 'success', // info / success / warning / error
                        $message = 'Nouvelle commande',
                        $messageLong = 'Nouvelle commande de cadeau par ' . $usermail,
                        // rand(1, 99999)), // optional
                        $href = '/admin/commandes', // optional, e.g. backpack_url('/example')
                        $hrefText = 'Voir' // optional
                    )
                );
            }
            return view('profil', compact('scores', 'orders', 'infos', 'paiements', 'leparrain', 'leparrainne', 'joueursParraines'));
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
                    'pays' => $request->state,
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
                $infos->pays = $request->state;                
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

    public function deleteUser(Request $request, $id)
    {
        $thisuser = User::where('id', $id)->first();

        if (!$thisuser) {
            return redirect('/')->with('error', 'Utilisateur non trouvé.');
        }

        // Création de la notification
        $admin = User::where('role', 'admin')->first();
        $admin->notify(
            new DatabaseNotification(
                'info', // Type de notification : info / success / warning / error
                'Désinscription',
                'Désinscription de : ' . $thisuser->email
            )
        );

        $thisuser->delete();
        $request->session()->flush();
        Auth::logout();

        return redirect('/')->with('success', 'Utilisateur supprimé avec succès.');
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
}
