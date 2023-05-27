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
        Schema::create('jackpot_tresor', function (Blueprint $table) {
            $table->id();
            $table->integer('jackpot')->default(0);
            $table->string('dernier_gagnant')->default('');
            $table->timestamp('date_gagnant')->nullable();
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
        Schema::dropIfExists('jackpot_tresor');
    }
};
