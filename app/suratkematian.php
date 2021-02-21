<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suratkematian extends Model
{
    protected $table="suratkematian";

    protected $fillable = ['nik','nama','umur','jenkel','tanggal_lahir','tanggal_meninggal','agama','pekerjaan','pendidikan','alamat','keterangan','foto_suratketrs','foto_ktp','foto_kk'];
}
