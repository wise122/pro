<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaBts extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'nama',
        'user_id',
        'jadwal_bts_id',
        'instansi_id',
        'nama_instansi'
    ];

    public function jadwal_bts()
    {
        return $this->belongsTo(JadwalBts::class, 'jadwal_bts_id');
    }

    public function nama_peserta()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
