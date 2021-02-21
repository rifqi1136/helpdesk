<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    protected $table="keluhan";

    protected $fillable = ['id_kel','nama_lengkap','alamat','keluhan','status_baca','status_acc'];
}
