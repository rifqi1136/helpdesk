<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table="pegawai";

    protected $fillable = ['id_pegawai','nama_pegawai','alamat','no_telp','bagian'];
}
