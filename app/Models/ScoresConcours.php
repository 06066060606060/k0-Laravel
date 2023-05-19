<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScoreConcours extends Model
{
    protected $table = 'score_concours';

    protected $fillable = [
        'id_user',
        'score',
    ];

    // Ajoutez ici les relations ou les méthodes supplémentaires si nécessaire
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
