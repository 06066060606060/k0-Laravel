<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Scores;
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
        // $out = new \Symfony\Component\Console\Output\ConsoleOutput(); 
        // $out->writeln($request); 
        return response()->json($request);
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
