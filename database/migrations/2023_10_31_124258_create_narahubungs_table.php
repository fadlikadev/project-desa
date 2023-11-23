<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNarahubungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('narahubungs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kontak');
            $table->string('link')->nullable();
            $table->timestamps();
        });

        DB::table('narahubungs')->insert(
            array(
                ['nama' => 'Kenji Matsuya', 'kontak' => '0815-2194-1914', 'link' => 'https://wa.me/6281521941914'],
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
        Schema::dropIfExists('narahubungs');
    }
}
