<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KTP extends Model
{
    protected $table="ktp";

    protected $fillable = ['nik','nama','alamat','tempat_lahir','tanggal_lahir','jenkel','goldar','status','agama','pekerjaan','kewarganegaraan','masa_berlaku','foto_sendiri','foto_ttd'];
}
