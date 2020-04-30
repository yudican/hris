<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataSusunanAnak extends Model
{
    protected $table = 'biodata_susunan_anak';

    protected $fillable = [
        'bsa_nama',
        'bsa_jenis_anak',
        'bsa_tanggal_lahir',
        'bsa_pekerjaan',
        'bsa_pendidikan',
        'bsa_alamat',
        'bsa_nomor_hp',
        'bsa_perkawinan',
        'bsap_jenis',
        'bsap_nama',
        'bsap_pekerjaan',
        'bsap_nomor_hp',
        'nomor_ktp',
    ];
}
