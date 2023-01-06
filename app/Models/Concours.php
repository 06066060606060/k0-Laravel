<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Concours extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'concours';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'image',
        'type',
        'description',
        'condition',
        'date_debut',
        'date_fin',
        'cadeau_id',
        'game_id',
     ];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function setImageAttribute($value)
    {
    
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "/uploads";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
   

    // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function cadeau()
    {
        return $this->belongsTo(Cadeaux::class);
    }

    public function game()
    {
        return $this->belongsTo(Games::class);
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
