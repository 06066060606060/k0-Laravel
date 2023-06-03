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
        Schema::table('concours', function (Blueprint $table) {
            $table->string('description_en', 255)->after('description');
            $table->string('description_de', 255)->after('description_en');
            $table->string('description_es', 255)->after('description_de');
            $table->string('description_it', 255)->after('description_es');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('concours', function (Blueprint $table) {
            //
        });
    }
};
