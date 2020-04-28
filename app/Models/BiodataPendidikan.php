<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataPendidikan extends Model
{
    protected $table = 'biodata_pendidikan';

    protected $fillable = [
        'pendidikan_nama',
        'pendidikan_kota',
        'pendidikan_jurusan',
        'pendidikan_fakultas',
        'pendidikan_jenjang',
        'pendidikan_mulai',
        'pendidikan_lulus',
        'pendidikan_ipk',
        'nomor_ktp',
    ];
}
