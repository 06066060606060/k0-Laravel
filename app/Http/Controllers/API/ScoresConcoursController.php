<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ScoresConcours;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ScoresConcoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Scores = ScoresConcours::all();
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scores  $scores
     * @return \Illuminate\Http\Response
     */
    public function show(ScoresConcours $scoresconcours)
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
    public function update(Request $request, ScoresConcours $scoresconcours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scores  $scores
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScoresConcours $scoresConcours)
    {
        //
    }
}
