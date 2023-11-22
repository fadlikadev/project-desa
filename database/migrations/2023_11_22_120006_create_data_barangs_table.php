<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('satuan_barang');
            $table->string('jumlah_barang');
            $table->timestamps();
        });

        DB::table('data_barangs')->insert(
            array(
                ['kode_barang' => 'A01', 'nama_barang' => 'Mobil Operasional', 'satuan_barang' => 'Unit', 'jumlah_barang' => 10],
                ['kode_barang' => 'A02', 'nama_barang' => 'Mobil Ambulance', 'satuan_barang' => 'Unit', 'jumlah_barang' => 3],
                ['kode_barang' => 'A03', 'nama_barang' => 'Mobil Maskara', 'satuan_barang' => 'Unit', 'jumlah_barang' => 5],
                ['kode_barang' => 'B01', 'nama_barang' => 'Kursi', 'satuan_barang' => 'Buah', 'jumlah_barang' => 100],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_barangs');
    }
}
