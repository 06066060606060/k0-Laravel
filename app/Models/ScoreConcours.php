<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScoreConcours extends Model
{
    protected $table = 'score_concours';

    protected $fillable = [
        'id_user',
        'score',
        // Autres attributs de la table score_concours
    ];

    // Définir les relations ou les méthodes supplémentaires si nécessaire
}
