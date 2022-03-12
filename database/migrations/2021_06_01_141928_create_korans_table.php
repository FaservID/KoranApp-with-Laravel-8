<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korans', function (Blueprint $table) {
            $table->id('id_koran');
            $table->string('kode_koran')->nullable();
            $table->string('nama_koran')->nullable();
            $table->string('harga')->nullable();
            $table->string('logo_brand')->nullable();
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
        Schema::dropIfExists('korans');
    }
}
