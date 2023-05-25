<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocalizationController extends Controller
{
    public function changeLanguage($locale)
    {
        // Stocker la langue choisie dans la variable de session
        session()->put('locale', $locale);

        // Rediriger l'utilisateur vers la page précédente
        return redirect()->back();
    }
}
