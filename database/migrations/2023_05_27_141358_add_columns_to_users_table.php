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
        $table->integer('pelle1')->default(1);
        $table->integer('pelle2')->default(0);
        $table->integer('pelle3')->default(0);
        $table->integer('pelle4')->default(0);
        $table->integer('pelle5')->default(0);
        $table->integer('pelle6')->default(0);
        $table->integer('support1')->default(1);
        $table->integer('support2')->default(0);
        $table->integer('support3')->default(0);
        $table->integer('support4')->default(0);
        $table->integer('support5')->default(0);
        $table->integer('support6')->default(0);
        $table->integer('support1_level')->default(1);
        $table->integer('support2_level')->default(1);
        $table->integer('support3_level')->default(1);
        $table->integer('support4_level')->default(1);
        $table->integer('support5_level')->default(1);
        $table->integer('support6_level')->default(1);
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
