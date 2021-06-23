<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wisata_id');
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('pelanggan_id');
            $table->integer('harga');
            $table->date('tgl');
            $table->foreign('wisata_id')->references('id_wisata')->on('wisatas')->onDelete('cascade');
            $table->foreign('hotel_id')->references('id_hotel')->on('hotel')->onDelete('cascade');
            $table->foreign('pelanggan_id')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade');
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
        Schema::dropIfExists('bookings');
    }
}
