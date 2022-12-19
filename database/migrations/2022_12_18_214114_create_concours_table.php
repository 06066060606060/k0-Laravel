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
        Schema::create('concours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('type')->nullable();
            $table->string('description')->nullable();
            $table->string('condition')->nullable();
            $table->datetime('date_debut')->nullable();
            $table->datetime('date_fin')->nullable();
            $table->unsignedBigInteger('cadeau_id')->nullable();
            $table->foreign('cadeau_id')->references('id')->on('cadeaux')->onDelete('cascade');
            $table->unsignedBigInteger('game_id')->nullable();
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
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
        Schema::dropIfExists('concours');
    }
};
