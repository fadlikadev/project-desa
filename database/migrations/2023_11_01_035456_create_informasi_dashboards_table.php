<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasiDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi_dashboards', function (Blueprint $table) {
            $table->id();
            $table->string('foto_informasi');
            $table->text('deskripsi_informasi');
            $table->timestamps();
        });

        DB::table('informasi_dashboards')->insert([
            'foto_informasi' => 'gambar_dashboard.jpeg', 
            'deskripsi_informasi' => '<p style="text-align: justify; ">Ini adalah dashboard dari Aplikasi <b>Penerimaan Peserta Didik Baru (PPDB) </b>SMPN 1 Tanjungsiang Kabupaten Subang. Lengkapi data yang ada di aplikasi ini agar kami dari panitia PPDB bisa lebih optimal dalam melaksanakan pendataan pendaftaran siswa baru ya. Selamat beraktivitas.</p>',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasi_dashboards');
    }
}
