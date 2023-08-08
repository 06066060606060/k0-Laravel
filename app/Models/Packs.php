<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Packs extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'packs';
    // protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];
   protected $fillable = ['name', 'image', 'description', 'description_en', 'description_de', 'description_es', 'description_it', 'add', 'add_en', 'add_de', 'add_es', 'add_it', 'prix', 'promo', 'active', 'prix_promo', 'gain', 'type'];
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
