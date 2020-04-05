<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerusahaanModel extends Model
{
    protected $table = 'perusahaan';

    protected $fillable = [
        'perusahaan_nama',
        'perusahaan_provinsi',
        'perusahaan_kabupaten',
        'perusahaan_kecamatan',
        'perusahaan_kelurahan',
        'perusahaan_kodepos',
        'perusahaan_alamat',
        'perusahaan_email',
        'perusahaan_fax',
        'perusahaan_telepon',
        'perusahaan_twitter',
        'perusahaan_facebook',
        'perusahaan_instagram',
        'perusahaan_website',
        'perusahaan_logo', 
        'perusahaan_favicon'
    ];

    protected $guarded = [
        'created_at', 'upated_at'
    ];
}
