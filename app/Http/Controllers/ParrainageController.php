<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ParrainageController extends Controller
{
    public function setParrainageLink(Request $request, $le_parrain)
    {
        // Stockez le nom d'utilisateur dans le localstorage ou tout autre moyen de stockage approprié
        // Voici un exemple d'utilisation de la méthode "put" pour stocker dans le localstorage
        
        // Assurez-vous d'inclure la bibliothèque Illuminate\Support\Facades\Session en haut du fichier        
        Session::put('parrain', $le_parrain);
        
        // Redirigez vers la page d'inscription ou toute autre page pertinente
        return redirect('https://gokdo.com/admin/register');
    }
}