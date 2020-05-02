<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataDarurat extends Model
{
    protected $table = 'biodata_darurat';

    protected $fillable = [
        'bd_jenis',
        'bd_nama',
        'bd_pekerjaan',
        'bd_posisi',
        'bd_domisili',
        'bd_telepon',
        'nomor_ktp',
    ];
}
