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
    public function up()
    {
        Schema::table('score_concours', function (Blueprint $table) {
            $table->integer('game_id')->after('score'); // Remplacez 'column_name' par le nom de la colonne après laquelle vous souhaitez ajouter la nouvelle colonne
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('score_concours', function (Blueprint $table) {
            //
        });
    }
};
