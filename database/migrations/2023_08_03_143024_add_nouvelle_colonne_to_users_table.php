<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    Schema::table('users', function (Blueprint $table) {
        // Ajouter la nouvelle colonne avant la colonne 'partie_egypt'
        $table->integer('jours_gratuits')->default(0)->before('partie_egypt');
    });

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
