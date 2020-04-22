<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataKtp extends Model
{
    // define table name
    protected $table = 'biodata_ktp';

    // define the primary key
    protected $primaryKey = 'ktp_nomor';

    protected $fillable = [
        'ktp_nomor',
        'ktp_nama',
        'ktp_tmp_lahir',
        'ktp_tgl_lahir',
        'ktp_gender',
        'ktp_gol',
        'ktp_alamat',
        'ktp_rt',
        'ktp_rw',
        'ktp_kelurahan',
        'ktp_kecamatan',
        'ktp_kabupaten',
        'ktp_propinsi',
        'ktp_agama',
        'ktp_pekerjaan',
        'ktp_kewarganegaraan',
        'ktp_perkawinan',
    ];
}
