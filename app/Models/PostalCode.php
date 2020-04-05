<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    protected $table = 'provinsi_kodepos';
    // protected $primaryKey  = 'province_code';
    protected $fillable = [
        'urban', 'sub_district', 'city', 'postal_code', 'province_id'
    ];

    public function province(){
    	return $this->belongsTo(Province::class, 'id');
    }
}
