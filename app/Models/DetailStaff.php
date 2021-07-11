<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailStaff extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_staff',
        'jabatan',
        'gaji_pokok'
    ];

    protected $table = 'detail_staffs';
}
