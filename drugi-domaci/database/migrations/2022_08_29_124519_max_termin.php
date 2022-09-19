<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MaxTermin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('termin', function (Blueprint $table) {
            $table->integer('max_broj_prijava');
            $table->integer('broj_prijava');
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
            $table->dropColumn('max_broj_prijava');
            $table->dropColumn('broj_prijava');
        });
    }
}
