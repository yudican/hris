<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataLisensi extends Model
{
    protected $table = 'biodata_lisensi';

    protected $fillable = [
        'bil_kategori',
        'bil_jenis',
        'bil_nomor',
        'nomor_ktp',
    ];
}
