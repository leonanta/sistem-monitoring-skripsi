<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilUjianModel extends Model
{
    protected $table = 'hasil_ujian';
    protected $fillable = ['nim', 'id_proposal', 'id_semester'];
}
