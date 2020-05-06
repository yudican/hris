<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataTtd extends Model
{
    protected $table = 'biodata_ttd';

    protected $fillable = [
        'bittd_kota',
        'bittd_tanggal',
        'bittd_nama',
        'bittd_persetujuan',
        'nomor_ktp',
    ];
}
