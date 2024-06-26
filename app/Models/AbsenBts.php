<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenBts extends Model
{
    use HasFactory;

    protected $fillable = [
        'peserta_bts_id',
        'tanggal_absen'
    ];
}
