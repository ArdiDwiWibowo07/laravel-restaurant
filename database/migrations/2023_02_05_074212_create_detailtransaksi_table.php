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
        Schema::create('detailtransaksi', function (Blueprint $table) {
            $table->id('kode_relasi');
            $table->unsignedBigInteger('kode_transaksi');
            $table->unsignedBigInteger('kode_menupesan');
            $table->foreign('kode_transaksi')->references('kode_transaksi')->on('transaksi');
            $table->foreign('kode_menupesan')->references('id')->on('menu');
            $table->integer('jumlah_pesanan');
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
        Schema::dropIfExists('detailtransaksi');
    }
};
