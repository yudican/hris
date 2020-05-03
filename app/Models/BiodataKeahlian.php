<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataKeahlian extends Model
{
    protected $table = 'biodata_keahlian';

    protected $fillable = [ 'keahlian_nama', 'keahlian_nilai', 'nomor_ktp' ];
}
