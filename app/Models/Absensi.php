<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';

    protected $fillable = [
        'karyawan_name',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'created_at',
        'updated_at'
    ];
    
}
