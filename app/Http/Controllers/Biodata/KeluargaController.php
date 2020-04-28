<?php

namespace App\Http\Controllers\Biodata;

use App\Models\BiodataKtp;
use Illuminate\Http\Request;
use App\Models\BiodataKeluarga;
use App\Http\Controllers\Controller;
use App\Http\Requests\BiodataKeluargaFormRequest;

class KeluargaController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $dataKtp = BiodataKtp::where('id', $id)->first();
        $previews = '';
        if ($dataKtp->ktp_gender == 'Perempuan' && $dataKtp->ktp_perkawinan == 'Kawin') {
            $previews = route('biodata_kehamilan', ['biodata_kehamilan' => $id]);
        }elseif ($dataKtp->ktp_perkawinan == 'Kawin') {
            $previews = route('biodata-ktp.edit', ['biodata_ktp' => $id]);
        }
        return view('user.biodata-keluarga', [
            'title' => 'Biodata Keluarga',
            'rows' => BiodataKeluarga::where('nomor_ktp', $dataKtp->ktp_nomor)->get(),
            'action' => route('biodata-keluarga.store'),
            'dataKtp' =>  $dataKtp, // nomor ktp
            'previews' => $previews,
            'no' => 0
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = ['required' => 'Field tidak boleh kosong']; // rules kehamilan status
        $this->validate($request, [
            'keluarga_nama1' => 'required',
            'keluarga_jenis1' => 'required',
            'keluarga_gender1' => 'required',
            'keluarga_tanggal_lahir1' => 'required',
        ], $messages);

        $data = [
            'keluarga_nama' => $request->keluarga_nama1,
            'keluarga_jenis' => $request->keluarga_jenis1,
            'keluarga_gender' => $request->keluarga_gender1,
            'keluarga_tanggal_lahir' => $request->keluarga_tanggal_lahir1,
            'nomor_ktp' => $request->nomor_ktp1,
        ];

        BiodataKeluarga::create($data);
        return redirect()->back()->withSuccess('Biodata keluarga berhasil di input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(BiodataKeluargaFormRequest $request)
    {
        foreach ($request->id as $key => $value) {
            $data = [
                'keluarga_nama' => $request->keluarga_nama[$key],
                'keluarga_jenis' => $request->keluarga_jenis[$key],
                'keluarga_gender' => $request->keluarga_gender[$key],
                'keluarga_tanggal_lahir' => $request->keluarga_tanggal_lahir[$key],
                'nomor_ktp' => $request->nomor_ktp,
            ];

            BiodataKeluarga::where('id', $request->id[$key])->update($data);
        }

        return redirect()->back()->withSuccess('Biodata keluarga berhasil di update');
    }
}
