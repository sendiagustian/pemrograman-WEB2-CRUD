<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_student',
        'jurusan',
        'asal_sekolah'
    ];

    protected $table = 'detail_students';
}
