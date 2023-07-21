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
    Schema::table('users', function (Blueprint $table) {
        $table->renameColumn('nb_achats', 'nb_achats_mini');
        $table->integer('nb_achats_starter')->default(0);
        $table->integer('nb_achats_booster')->default(0);
        $table->integer('nb_achats_maxi')->default(0);
        $table->integer('nb_achats_tera')->default(0);
        $table->integer('nb_achats_expert')->default(0);
    });
}

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
