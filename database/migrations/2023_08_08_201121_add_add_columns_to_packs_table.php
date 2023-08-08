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
        Schema::table('packs', function (Blueprint $table) {
            $table->string('add', 255)->default('')->after('description_it');
            $table->string('add_en', 255)->default('')->after('add');
            $table->string('add_de', 255)->default('')->after('add_en');
            $table->string('add_es', 255)->default('')->after('add_de');
            $table->string('add_it', 255)->default('')->after('add_es');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packs', function (Blueprint $table) {
            //
        });
    }
};
