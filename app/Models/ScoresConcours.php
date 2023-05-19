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
}
