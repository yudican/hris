<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\LowonganModel;

class CekLowonganStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lowongans = LowonganModel::all();
        $first = Carbon::now();
        $cek = [];
        foreach ($lowongans as $lowongan) {
            if($first->greaterThanOrEqualTo($lowongan->lowongan_tanggal_close)){
                LowonganModel::find($lowongan->id)->update(['lowongan_status' => 'Tutup']);
            }
        }
        return $next($request);
    }
}
