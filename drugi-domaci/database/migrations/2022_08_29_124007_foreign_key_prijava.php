<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyPrijava extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prijavas', function (Blueprint $table) {
            $table->unsignedBigInteger('termin_id');

            $table->foreign('termin_id')->references('id')->on('termins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prijavas', function (Blueprint $table) {
            $table->dropForeign(['termin_id']);
        });
    }
}
