<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PartiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
      
        $user = User::all();
        return response()->json($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id  = $request->user_id;
        //update user global score
        $user = User::where('id', $user_id)->first();
        //subtract request score from user global score but nover go below 0
        $user->parties = $user->parties + 10;
        $user->trophee2 =  $user->trophee2 - 5;
        //add request score to user global score
       // $user->global_score = $user->global_score + $request->score;
        $user->save();
        return response()->json($user);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       // $myid = session()->get('user_id');
       if ($request->id ==  3) {
        $data = User::where('id', $request->id)->first();
        return response()->json($data);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}