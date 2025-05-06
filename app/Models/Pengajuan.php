<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuans';

    protected $fillable = [
        'name',
        'judul',
        'deskripsi',
        'status',
        'tanggal_pengajuan'
    ];
}
