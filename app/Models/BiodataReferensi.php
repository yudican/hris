<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataReferensi extends Model
{

    protected $table = 'biodata_referensi';

    protected $fillable = [
        'br_nama',
        'br_hubungan',
        'br_jabatan',
        'br_cabang',
        'br_status',
        'nomor_ktp',
    ];
}
