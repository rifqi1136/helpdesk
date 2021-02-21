<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table="artikel";
    protected $dates=['created_at'];

    protected $fillable=['id_post','judul','deskripsi','gamabar'];
}
