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
        Schema::create('derniers_gagnants_concours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('score');
            $table->string('gain');
            $table->dateTime('date_gain');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('derniers_gagnants_concours');
    }
};
