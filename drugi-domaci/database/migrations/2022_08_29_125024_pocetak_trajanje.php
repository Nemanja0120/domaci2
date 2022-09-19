<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PocetakTrajanje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('termin', function (Blueprint $table) {
            $table->bigInteger('pocetak');
            $table->bigInteger('trajanje');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('termin', function (Blueprint $table) {
            $table->dropColumn(['pocetak', 'trajanje']);
        });
    }
}
