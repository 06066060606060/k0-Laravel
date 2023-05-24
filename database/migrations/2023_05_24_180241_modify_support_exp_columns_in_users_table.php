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
            $table->integer('support1_exp')->default(0)->change();
            $table->integer('support2_exp')->default(0)->change();
            $table->integer('support3_exp')->default(0)->change();
            $table->integer('support4_exp')->default(0)->change();
            $table->integer('support5_exp')->default(0)->change();
            $table->integer('support6_exp')->default(0)->change();
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
