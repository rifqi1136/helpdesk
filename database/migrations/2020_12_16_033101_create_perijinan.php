<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerijinan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perijinan', function (Blueprint $table) {
            $table->id('nik');
            $table->string('nama_lengkap');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('kegiatan_usaha');
            $table->string('sarana_usaha');
            $table->integer('jumlah_modal');
            $table->string('surat_pengantar');
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
        Schema::dropIfExists('perijinan');
    }
}
