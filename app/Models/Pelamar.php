<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    protected $table = 'pelamar';

    protected $fillable = [
        'pelamar_nik',
        'pelamar_nama',
        'pelamar_rt',
        'pelamar_rw',
        'pelamar_provinsi',
        'pelamar_kabupaten',
        'pelamar_kecamatan',
        'pelamar_kelurahan',
        'pelamar_kodepos',
        'pelamar_alamat',
        'pelamar_hp',
        'pelamar_email',
        'pelamar_major',
        'pelamar_jurusan',
        'pelamar_status',
        'pelamar_tanggal_lahir',
        'pelamar_foto',
        'pelamar_tanggal',
        'pelamar_tinggal_dengan',
        'pelamar_jenis_tinggal',
    ];

    public function lowongan()
    {
        return $this->belongsToMany(LowonganModel::class, 'lowongan_pelamar', 'pelamar_id', 'lowongan_id');
    }

    public function process()
    {
        return $this->hasMany(ProsesSeleksi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
