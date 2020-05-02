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
            'rows' => BiodataReferensi::where('nomor_ktp', $dataKtp->ktp_nomor)->get(),
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
        $validation['br_status1'] = 'required';
        if ($request->br_status1 == 'Ya') {
            $validation['br_nama1'] = 'required';
            $validation['br_hubungan1'] = 'required';
            $validation['br_jabatan1'] = 'required';
            $validation['br_cabang1'] = 'required';
        }
        $validate = $this->validate($request, $validation, $messages);

        $data = [
            'br_nama' => $request->br_nama1,
            'br_hubungan' => $request->br_hubungan1,
            'br_jabatan' => $request->br_jabatan1,
            'br_cabang' => $request->br_cabang1,
            'br_status' => $request->br_status1,
            'nomor_ktp' => $request->nomor_ktp1,
        ];

        BiodataReferensi::updateOrCreate(['nomor_ktp' => $request->nomor_ktp1, 'br_nama' => $request->br_nama1, 'br_jabatan' => $request->br_jabatan1],$data);
        if ($request->br_status1 == 'Tidak') {
            return redirect()->route('biodata-darurat', ['biodata_darurat' => $id])->withSuccess('Biodata referensi berhasil di input');
        }
        return redirect()->back()->withSuccess('Biodata referensi berhasil di input');
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
