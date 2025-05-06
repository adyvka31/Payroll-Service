<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $table = 'gajis';

    protected $fillable = [
        'name',
        'bulan',
        'tahun',
am',
        'potongan',
        'total_gaji'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }    
}
