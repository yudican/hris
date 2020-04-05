<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LowonganModel extends Model
{
    use SoftDeletes;

    protected $table = 'lowongan';

    protected $dates = ['deleted_at', 'lowongan_tanggal_open', 'lowongan_tanggal_close'];

    protected $fillable = [
        'lowongan_bagian',
        'lowongan_karyawan',
        'lowongan_salary_max',
        'lowongan_wilayah',
        'lowongan_deskripsi',
        'lowongan_kualifikasi',
        'lowongan_status',
        'lowongan_tanggal_open',
        'lowongan_tanggal_close'
    ];

    public function pelamar()
    {
        return $this->belongsToMany(Pelamar::class, 'lowongan_pelamar', 'lowongan_id', 'pelamar_id');
    }
        
}
