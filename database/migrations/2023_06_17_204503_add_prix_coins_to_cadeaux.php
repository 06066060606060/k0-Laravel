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
        $table->decimal('prix_coins', 8, 2)->default(0.00)->after('prix');
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
