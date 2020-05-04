<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataKtp extends Model
{
    // define table name
    protected $table = 'biodata_ktp';

    // define the primary key
    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'ktp_nomor',
        'ktp_nama',
        'ktp_tmp_lahir',
        'ktp_tgl_lahir',
        'ktp_gender',
        'ktp_gol_darah',
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
        'ktp_tinggi_badan',
        'ktp_berat_badan',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'ktp_id', 'id');
    }
}
