<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilSemproModel extends Model
{
    protected $table = 'hasil_sempro';
    protected $fillable = ['nim', 'id_proposal', 'id_semester'];
}
