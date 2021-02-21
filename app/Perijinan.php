<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perijinan extends Model
{
    protected $table="perijinan";

    protected $fillable = ['nik','nama_lengkap','alamat','no_telp','kegiatan_usaha','sarana_usaha','jumlah_modal','surat_pengantar'];
}
