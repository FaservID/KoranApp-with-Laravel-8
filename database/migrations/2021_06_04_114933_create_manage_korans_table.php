<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageKoransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_korans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_koran')->nullable();
            $table->integer('id_user')->nullable();
            $table->string('koran_masuk')->nullable();
            $table->string('koran_terkirim')->nullable();
            $table->string('koran_sisa')->nullable();
            $table->date('tanggal_masuk')->nullable();
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
        Schema::dropIfExists('manage_korans');
    }
}
