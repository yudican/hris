<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataKehamilan extends Model
{
    protected $table = 'biodata_kehamilan';

    protected $fillable = ['nomor_ktp', 'kehamilan_status', 'kehamilan_usia', 'kehamilan_akhir'];
}
