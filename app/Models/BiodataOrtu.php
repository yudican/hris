<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataOrtu extends Model
{
    protected $table = 'biodata_orang_tua';

    protected $fillable = [
        'ortu_jenis',
        'ortu_nama',
        'ortu_tanggal_lahir',
        'ortu_lulusan',
        'ortu_alamat',
        'ortu_rt',
        'ortu_rw',
        'ortu_kelurahan',
        'ortu_kecamatan',
        'ortu_kabupaten',
        'ortu_propinsi',
        'ortu_pekerjaan',
        'nomor_ktp'
    ];
}
