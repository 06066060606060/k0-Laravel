<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cadeaux;
use Illuminate\Http\Request;

class StoreController extends Controller
{
   
    public function index() 
    { 
        $cadeaux = Cadeaux::all();
        return response()->json($cadeaux);
    }


}
