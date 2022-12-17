<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Games;
use App\Models\Pages;
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
       $freegames = Games::where('type', 'Gratuit')->where('status',  0)->limit(6)->inRandomOrder()->get();
       $boostergames = Games::where('type', 'Booster')->limit(6)->inRandomOrder()->get();
       $starred = Games::where('status',  1)->inRandomOrder()->get();
       $starred = $starred[0];
         return view('index', compact('freegames', 'boostergames', 'starred'));
    }

    public function game(Request $request)
    {
        $onegame = Games::where('id',  $request->id)->get();
        $scores = Scores::where('game_id',  $request->id)->get();
        $game = $onegame[0];
      
        return view('game', compact('game', 'scores'));
    }

    static function pages(){
        $pages = Pages::all();
        return $pages;
    }


    
    static function starred()
    {
        $starred = Games::where('status',  1)->inRandomOrder()->get();
        return $starred;
    }


    public function games()
    {
        $freegames = Games::where('type', 'Gratuit')->inRandomOrder()->get();
        $boostergames = Games::where('type', 'Booster')->inRandomOrder()->get();
        return view('games', compact('freegames', 'boostergames'));
    }

    public function winner()
    {
        return view('winner');
    }

    public function help()
    {
        return view('help');
    }

    static function version()
    {
        $filename = '../public/build/manifest.json';
       // $ver = date('d/m/y H:i', filemtime($filename) + 3600);
       $ver = "1.1.0";
        $version = $ver;
        return $version;
    }

    public function getProfil()
    {
        $usermail = backpack_auth()->user()->email;
        $userid =  backpack_auth()->user()->id;
        $scores = Scores::where('user_id', $userid)->get();

        return view('profil', compact('scores'));
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
