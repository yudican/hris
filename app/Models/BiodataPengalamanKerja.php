<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataPengalamanKerja extends Model
{
    protected $table = 'biodata_pengalaman_kerja';

    protected $fillable = [
        'bp_perusahan',
        'bp_jabatan',
        'bp_kota',
        'bp_mulai',
        'bp_akhir',
        'bp_gaji_terakhir',
        'bp_nama_atasan',
        'bp_nomor_tlp_atasan',
        'bp_jobdesc',
        'bp_alasan_berhenti',
        'nomor_ktp',
    ];
}
