<?php

namespace App\Http\Controllers\Biodata;

use App\Models\Province;
use App\Models\BiodataKtp;
use App\Models\BiodataOrtu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BiodataOrtuFormRequest;

class OrtuController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $dataKtp = BiodataKtp::where('id', $id)->first();
        $previews = route('biodata-keluarga.create', ['biodata_keluarga' => $id]);
        $rows = BiodataOrtu::where('nomor_ktp', $dataKtp->ktp_nomor)->get();
        return view('user.biodata-ortu', [
            'title' => 'Biodata ortu',
            'provinces' => Province::all(),
            'rows' => count($rows) > 0 ? $rows : range(0,1),
            'action' => count($rows) > 0 ? route('biodata-ortu.update', ['biodata_ortu' => $id]) : route('biodata-ortu.store', ['biodata_ortu' => $id]),
            'dataKtp' =>  $dataKtp, // nomor ktp
            'previews' => $previews,
            'method' => count($rows) > 0 ? 'PUT' : 'POST',
            'id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BiodataOrtuFormRequest $request, $id)
    {
        foreach ($request->ortu_jenis as $key => $value) {
            $data = [
                'ortu_jenis' => $request->ortu_jenis[$key],
                'ortu_nama' => $request->ortu_nama[$key],
                'ortu_tanggal_lahir' => $request->ortu_tanggal_lahir[$key],
                'ortu_lulusan' => $request->ortu_lulusan[$key],
                'ortu_alamat' => $request->ortu_alamat[$key],
                'ortu_rt' => $request->ortu_rt[$key],
                'ortu_rw' => $request->ortu_rw[$key],
                'ortu_kelurahan' => $request->ortu_kelurahan[$key],
                'ortu_kecamatan' => $request->ortu_kecamatan[$key],
                'ortu_kabupaten' => $request->ortu_kabupaten[$key],
                'ortu_propinsi' => $request->ortu_propinsi[$key],
                'ortu_pekerjaan' => $request->ortu_pekerjaan[$key],
                'nomor_ktp' => $request->nomor_ktp,
            ];

            BiodataOrtu::create($data);
        }

        return redirect()->route('biodata-susunan-anak.create', ['biodata_susunan_anak' => $id])->withSuccess('Biodata keluarga berhasil di input');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(BiodataOrtuFormRequest $request, $id)
    {
        foreach ($request->id as $key => $value) {
            $data = [
                'ortu_jenis' => $request->ortu_jenis[$key],
                'ortu_nama' => $request->ortu_nama[$key],
                'ortu_tanggal_lahir' => $request->ortu_tanggal_lahir[$key],
                'ortu_lulusan' => $request->ortu_lulusan[$key],
                'ortu_alamat' => $request->ortu_alamat[$key],
                'ortu_rt' => $request->ortu_rt[$key],
                'ortu_rw' => $request->ortu_rw[$key],
                'ortu_kelurahan' => $request->ortu_kelurahan[$key],
                'ortu_kecamatan' => $request->ortu_kecamatan[$key],
                'ortu_kabupaten' => $request->ortu_kabupaten[$key],
                'ortu_propinsi' => $request->ortu_propinsi[$key],
                'ortu_pekerjaan' => $request->ortu_pekerjaan[$key],
                'nomor_ktp' => $request->nomor_ktp,
            ];
            
            BiodataOrtu::where('id', $request->id[$key])->update($data);
            
        }

        return redirect()->route('biodata-susunan-anak.create', ['biodata_susunan_anak' => $id])->withSuccess('Biodata keluarga berhasil di update');
    }

}
