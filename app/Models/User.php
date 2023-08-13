<?php

namespace App\Models;

//  use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{

    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasApiTokens, HasFactory, Notifiable;
    use HasUuids;
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'abonnement',
        'global_score',
        'parties',
        'trophee1',
        'trophee2',
        'trophee3',
        'parrain',
        'nb_achats_mini',
        'nb_achats_starter',
        'nb_achats_booster',
        'nb_achats_maxi',
        'nb_achats_tera',
        'nb_achats_expert',
        'pelle1',
        'support1',
        'jours_gratuit',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function score()
    {
        return $this->belongsTo(Scores::class, 'game_id', 'user_id', 'score');
    }

    public function hasPermissionTo()
    {
        return 'notifications admin';
    }



}
