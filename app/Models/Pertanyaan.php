<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';

    protected $fillable = ['pertanyaan_isi'];

    public function jawaban()
    {
        return $this->belongsToMany(BiodataJawaban::class, 'jawaban_pertanyaan', 'pertanyaan_id', 'jawaban_id');
    }
}
