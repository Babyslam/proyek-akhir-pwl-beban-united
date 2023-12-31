<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiKabupatenKecamatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kecamatans', function(Blueprint $table){
            $table->foreign('kabupaten_id')->references('id_kabupaten')->on('kabupatens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kecamatans', function(Blueprint $table){
            $table->string('kabupatens');
            $table->dropForeign(['id_kabupaten']);
        });
    }
}
