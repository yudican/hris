<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataKeluarga extends Model
{
    protected $table = 'biodata_keluarga';

    protected $fillable = ['nomor_ktp', 'keluarga_jenis', 'keluarga_nama', 'keluarga_gender', 'keluarga_tanggal_lahir'];
}
