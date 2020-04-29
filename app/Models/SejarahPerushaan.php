<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SejarahPerushaan extends Model
{
    protected $table = 'perusahaan_sejarah';

    protected $fillable = [
        'foto',
        'isi',
        'tanggal',
        'status'
    ];
}
