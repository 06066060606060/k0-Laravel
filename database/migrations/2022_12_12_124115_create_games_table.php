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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('banner')->nullable();
            $table->string('image')->nullable();
            $table->string('type')->nullable();
            $table->string('description')->nullable();
            $table->string('link')->nullable();
            $table->string('category')->nullable();
			$table->integer('nbr_gratuit')->nullable();
			$table->integer('prix')->nullable();
			$table->integer('type_prix')->nullable();
            $table->string('tags')->nullable();
            $table->string('status')->nullable();
            $table->string('data0')->nullable();
            $table->string('data1')->nullable();
            $table->string('data2')->nullable();
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
        Schema::dropIfExists('games');
    }
};
