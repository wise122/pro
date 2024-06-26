<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalBts extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'pelaksanaan_awal' => 'datetime',
        'pelaksanaan_akhir' => 'datetime',
    ];
}
