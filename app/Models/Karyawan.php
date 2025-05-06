<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $fillable = [
        'name',
        'nik',
        'email',
        'no_hp',
        'jabatan',
        'tanggal_masuk',
        'gaji',
        'gaji_tambahan',
        'status'
    ];

    public function absensi()
{
    return $this->hasMany(Absensi::class, 'karyawan_name', 'name');
}


}
