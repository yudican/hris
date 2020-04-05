<?php

namespace App\Models;

// use App\Models\PostalCode;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
    // protected $primaryKey  = 'province_code';
    
    protected $fillable = [
        'province_name', 'province_name_en'
    ];

    public function kodepos()
    {
       return $this->hasMany(PostalCode::class, 'province_id', 'id');
    }
}
