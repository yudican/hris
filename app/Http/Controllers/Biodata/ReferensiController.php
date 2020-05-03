<?php

namespace App\Http\Controllers\Biodata;

use App\Models\BiodataKtp;
use Illuminate\Http\Request;
use App\Models\BiodataReferensi;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReferensiFormRequest;

class ReferensiController extends Controller
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
        $previews = route('biodata-pengalaman-kerja.create', ['biodata_pengalaman_kerja' => $id]);
        return view('user.biodata-referensi', [
            'title' => 'Biodata Susunan Anak',
            'row' => BiodataReferensi::where('nomor_ktp', $dataKtp->ktp_nomor)->first(),
            'action' => route('biodata-referensi.store', ['biodata_referensi' => $id]),
            'dataKtp' =>  $dataKtp, // nomor ktp
            'previews' => $previews
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $messages = ['required' => 'Field tidak boleh kosong']; // rules status
        $validation['br_status'] = 'required';
        if ($request->br_status == 'Ya') {
            $validation['br_nama'] = 'required';
            $validation['br_hubungan'] = 'required';
            $validation['br_jabatan'] = 'required';
            $validation['br_cabang'] = 'required';
        }
        $validate = $this->validate($request, $validation, $messages);

        $data = [
            'br_nama' => $request->br_nama,
            'br_hubungan' => $request->br_hubungan,
            'br_jabatan' => $request->br_jabatan,
            'br_cabang' => $request->br_cabang,
            'br_status' => $request->br_status,
            'nomor_ktp' => $request->nomor_ktp,
        ];

        BiodataReferensi::updateOrCreate(['nomor_ktp' => $request->nomor_ktp, 'br_nama' => $request->br_nama, 'br_jabatan' => $request->br_jabatan],$data);
        return redirect()->route('biodata-darurat.create', ['biodata_darurat' => $id])->withSuccess('Biodata referensi berhasil di input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ReferensiFormRequest $request)
    {
        foreach ($request->id as $key => $value) {
            $data = [
                'br_nama' => $request->br_nama[$key],
                'br_hubungan' => $request->br_hubungan[$key],
                'br_jabatan' => $request->br_jabatan[$key],
                'br_cabang' => $request->br_cabang[$key],
                'br_status' => $request->br_status[$key],
                'nomor_ktp' => $request->nomor_ktp
            ];
            BiodataReferensi::where('id', $request->id[$key])->update($data);
        }

        return redirect()->back()->withSuccess('Biodata referensi berhasil di update');
    }
}
