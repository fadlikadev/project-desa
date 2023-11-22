<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataFasilitasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_fasilitases', function (Blueprint $table) {
            $table->id();
            $table->string('kode_fasilitas');
            $table->string('nama_fasilitas');
            $table->string('satuan_fasilitas');
            $table->string('jumlah_fasilitas');
            $table->timestamps();
        });

        DB::table('data_fasilitases')->insert(
            array(
                ['kode_fasilitas' => 'A01', 'nama_fasilitas' => 'Aula Abdjan Soelaeman', 'satuan_fasilitas' => 'Ruangan', 'jumlah_fasilitas' => 1],
                ['kode_fasilitas' => 'A02', 'nama_fasilitas' => 'GOR Badminton', 'satuan_fasilitas' => 'Ruangan', 'jumlah_fasilitas' => 2],
                ['kode_fasilitas' => 'A03', 'nama_fasilitas' => 'Aula Student Center', 'satuan_fasilitas' => 'Ruangan', 'jumlah_fasilitas' => 2],
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
        Schema::dropIfExists('data_fasilitases');
    }
}
