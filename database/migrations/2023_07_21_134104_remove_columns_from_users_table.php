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
            $table->dropColumn([
                'support2_level',
                'support3_level',
                'support4_level',
                'support5_level',
                'support6_level',
                'support6',
                'support5',
                'support4',
                'support3',
                'support2',
                'pelle6',
                'pelle5',
                'pelle4',
                'pelle3',
                'pelle2',
            ]);
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
