<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_names', function (Blueprint $table) {
            $table->id();
            $table->string('application_logo');
            $table->string('application_name');
            $table->string('application_nickname');
            $table->string('application_owner');
            $table->string('application_version');
            $table->string('application_developer');
            $table->string('link_application_developer');
            $table->timestamps();
        });

        DB::table('application_names')->insert([
            'application_logo' => 'pancasila.png', 
            'application_name' => 'Peminjaman Barang Desa',
            'application_nickname' => 'Inventory Desa',
            'application_owner' => 'Desa Bojongsoang',
            'application_version' => '1.0.0',
            'application_developer' => 'Kenji Matsuya',
            'link_application_developer' => 'https://www.instagram.com/rhie.kenji',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_names');
    }
}
