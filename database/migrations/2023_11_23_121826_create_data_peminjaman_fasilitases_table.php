<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPeminjamanFasilitasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_peminjaman_fasilitases', function (Blueprint $table) {
            $table->id();
            $table->string('status_pinjaman')->default('Menunggu Persetujuan');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('data_fasilitas_id');
            $table->foreign('data_fasilitas_id')->references('id')->on('data_fasilitases')->onDelete('cascade');
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
        Schema::dropIfExists('data_peminjaman_fasilitases');
    }
}
