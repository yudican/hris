<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataJawaban extends Model
{
    protected $table = 'biodata_jawaban';

    protected $fillable = ['jawaban_pertanyaan', 'nomor_ktp'];

    public function pertanyaan()
    {
        return $this->belongsToMany(Pertanyaan::class, 'jawaban_pertanyaan', 'jawaban_id', 'pertanyaan_id');
    }
}
