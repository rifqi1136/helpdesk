<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratkematian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratkematian', function (Blueprint $table) {
            $table->id('nik');
            $table->string('nama');
            $table->string('umur');
            $table->string('jenkel');
            $table->string('tanggal_lahir');
            $table->string('tanggal_meninggal');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('pendidikan');
            $table->string('alamat');
            $table->string('keterangan');
            $table->string('foto_suratketrs');
            $table->string('foto_ktp');
            $table->string('foto_kk');
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
        Schema::dropIfExists('suratkematian');
    }
}
