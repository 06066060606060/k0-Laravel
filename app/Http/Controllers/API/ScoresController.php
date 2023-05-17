<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Scores;
use App\Models\ScoresConcours;
use App\Models\Concours;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ScoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Scores = Scores::all();
        return response()->json($Scores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $decrypted = decrypt($request->secret);
        $secrettoken = $decrypted[0];
        $secretuser_id = $decrypted['userid'];
        $secretgame_id = $decrypted['gameid'];
        $secretrubis = $decrypted['rubis'];
        $secretscore = $decrypted['free_game'];
        $secretdata = $decrypted['parties'];
        $secrettime = $decrypted['timestamp'];

        if ( $request->user_id == $secretuser_id && $request->game_id == $secretgame_id) {
            Log::info('Secret token is valid');
            $Scores = new Scores();
            $Scores->user_id = $request->user_id;
            $Scores->game_id = $request->game_id;
            $Scores->score = $request->score;
            if ($request->µµµµ == 'µ') {
                $Scores->data = -100;
            } else {
                $Scores->data = $request->data;
            }
            $Scores->data2 = $request->data2;
            $Scores->data3 = $request->data3;
            $Scores->save();
            //update user data
            $user = User::where('id', $request->user_id)->first();
            if ($request->newgame == 1) {
             $user->trophee1 = $user->trophee1 - 100;
            } else {
            $user->trophee1 = $user->trophee1 + $request->data;
            }
            $user->trophee2 = $user->trophee2 + $request->data2;
            $user->trophee3 = $user->trophee3 + $request->data3;
            $user->save();

            // Si concours ou non
$concours = Concours::all();
if ($concours->isNotEmpty()) { // si concours
    // on verifie que Score Concours existe avec un enregistrement pour le user
    $scoreconcours = ScoreConcours::where('id_user', $user->id)->first();
    if ($scoreconcours) { // On update
        // Sommes des score à enregistrer au concours
        $data = floatval($request->data);
        $data2 = floatval($request->data2);
        $data3 = floatval($request->data3);
        $totalrequestvalue = $data + $data2 * 100 + $data3 * 1000;
        // On actualise tout cela 
        $scoreconcours->score = $scoreconcours->score + $totalrequestvalue;
        $scoreconcours->save();
    } else { // On create
        $data = floatval($request->data);
        $data2 = floatval($request->data2);
        $data3 = floatval($request->data3);
        $totalrequestvalue = $data + $data2 * 100 + $data3 * 1000;
        $scoreconcours = ScoreConcours::create([
            'id_user' => $user->id,
            'score' => $totalrequestvalue
        ]);
    }
} else {
    // Code pour le cas où il n'y a pas de concours
}


            return response()->json($Scores);
        } else {
            Log::info('Secret token is invalid');
            return response()->json('Secret token is invalid');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scores  $scores
     * @return \Illuminate\Http\Response
     */
    public function show(Scores $scores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scores  $scores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scores $scores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scores  $scores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scores $scores)
    {
        //
    }
}
