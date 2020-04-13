<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LowonganPelamar extends Model
{
    protected $table = 'lowongan_pelamar';

    public function pelamar()
    {
        return $this->hasMany(Pelamar::class, 'id', 'pelamar_id');
    }

    public function lowongan()
    {
        return $this->hasMany(LowonganModel::class, 'id', 'lowongan_id');
    }

}
