<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id('id_wisata');
            $table->string('nama_wisata');
            $table->unsignedBigInteger('kabupaten_id');
            $table->unsignedBigInteger('kecamatan_id');
            $table->unsignedBigInteger('tipe_id');
            $table->string('keterangan');
            $table->text('gambar');
            $table->foreign('kabupaten_id')->references('id_kabupaten')->on('kabupatens')->onDelete('cascade');
            $table->foreign('kecamatan_id')->references('id_kecamatan')->on('kecamatans')->onDelete('cascade');
            $table->foreign('tipe_id')->references('id_tipe')->on('tipe_wisatas')->onDelete('cascade');
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
        Schema::dropIfExists('wisatas');
    }
}
