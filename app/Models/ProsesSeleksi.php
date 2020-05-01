<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProsesSeleksi extends Model
{
    protected $table = 'proses_seleksi';

    protected $fillable = [
        'proses_ktp',
        'proses_status',
        'proses_tanggal',
    ];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class, 'pelamar_nik', 'proses_ktp');
    }

}
