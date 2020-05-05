<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataInformasi extends Model
{
    protected $table = 'biodata_informasi';

    protected $fillable = [
        'bioin_facebook',
        'bioin_instagram',
        'bioin_twitter',
        'bioin_linkedin',
        'bioin_email',
        'bioin_whatsapp',
        'nomor_ktp',
    ];
}
