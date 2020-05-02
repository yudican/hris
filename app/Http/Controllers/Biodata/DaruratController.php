<?php

namespace App\Http\Controllers\Biodata;

use App\Models\BiodataKtp;
use Illuminate\Http\Request;
use App\Models\BiodataDarurat;
use App\Http\Controllers\Controller;
use App\Http\Requests\DaruratFormRequest;

class DaruratController extends Controller
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
        $previews = route('biodata-referensi.create', ['biodata_referensi' => $id]);
        return view('user.biodata-darurat', [
            'title' => 'Biodata Darurat',
            'rows' => BiodataDarurat::where('nomor_ktp', $dataKtp->ktp_nomor)->get(),
            'action' => route('biodata-darurat.store'),
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
    public function store(Request $request)
    {
        $messages = ['required' => 'Field tidak boleh kosong', 'numeric' => 'field harus berupa angka']; // rules status
        $validation['bd_jenis1'] = 'required';
        $validation['bd_nama1'] = 'required';
        $validation['bd_pekerjaan1'] = 'required';
        $validation['bd_domisili1'] = 'required';
        $validation['bd_telepon1'] = 'required|numeric';

        $validate = $this->validate($request, $validation, $messages);

        $data = [
            'bd_jenis' => $request->bd_jenis1,
            'bd_nama' => $request->bd_nama1,
            'bd_pekerjaan' => $request->bd_pekerjaan1,
            'bd_posisi' => $request->bd_posisi1,
            'bd_domisili' => $request->bd_domisili1,
            'bd_telepon' => $request->bd_telepon1,
            'nomor_ktp' => $request->nomor_ktp1,
        ];

        BiodataDarurat::updateOrCreate(['nomor_ktp' => $request->nomor_ktp1, 'bd_jenis' => $request->bd_jenis1, 'bd_nama' => $request->bd_nama1],$data);
        return redirect()->back()->withSuccess('Biodata Darurat berhasil di input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(DaruratFormRequest $request)
    {
        foreach ($request->id as $key => $value) {
            $data = [
                'bd_jenis' => $request->bd_jenis[$key],
                'bd_nama' => $request->bd_nama[$key],
                'bd_pekerjaan' => $request->bd_pekerjaan[$key],
                'bd_posisi' => $request->bd_posisi[$key],
                'bd_domisili' => $request->bd_domisili[$key],
                'bd_telepon' => $request->bd_telepon[$key],
                'nomor_ktp' => $request->nomor_ktp
            ];
            BiodataDarurat::where('id', $request->id[$key])->update($data);
        }

        return redirect()->back()->withSuccess('Biodata darurat berhasil di update');
    }
}
