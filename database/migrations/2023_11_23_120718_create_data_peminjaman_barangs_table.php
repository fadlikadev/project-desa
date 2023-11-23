<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPeminjamanBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_peminjaman_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('status_pinjaman')->default('Menunggu Persetujuan');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('data_barang_id');
            $table->foreign('data_barang_id')->references('id')->on('data_barangs')->onDelete('cascade');
            $table->string('jumlah_pinjaman');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->string('keterangan');
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
        Schema::dropIfExists('data_peminjaman_barangs');
    }
}
