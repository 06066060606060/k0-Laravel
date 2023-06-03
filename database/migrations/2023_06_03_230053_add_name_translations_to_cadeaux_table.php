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
        Schema::table('cadeaux', function (Blueprint $table) {
            $table->string('name_en', 255)->after('name');
            $table->string('name_de', 255)->after('name_en');
            $table->string('name_es', 255)->after('name_de');
            $table->string('name_it', 255)->after('name_es');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cadeaux', function (Blueprint $table) {
            //
        });
    }
};
