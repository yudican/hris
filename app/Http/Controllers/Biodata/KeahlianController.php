<?php

namespace App\Http\Controllers\Biodata;

use App\Models\BiodataKtp;
use Illuminate\Http\Request;
use App\Models\BiodataKeahlian;
use App\Http\Controllers\Controller;
use App\Http\Requests\KeahlianFormRequest;

class KeahlianController extends Controller
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
        $previews = route('biodata-darurat.create', ['biodata_darurat' => $id]);
        return view('user.biodata-keahlian', [
            'title' => 'Biodata keahlian',
            'rows' => BiodataKeahlian::where('nomor_ktp', $dataKtp->ktp_nomor)->get(),
            'action' => route('biodata-keahlian.store'),
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
        $validation['keahlian_nama1'] = 'required';
        $validation['keahlian_nilai1'] = 'required|numeric';

        $validate = $this->validate($request, $validation, $messages);

        $data = [
            'keahlian_nama' => $request->keahlian_nama1,
            'keahlian_nilai' => $request->keahlian_nilai1,
            'nomor_ktp' => $request->nomor_ktp1,
        ];

        BiodataKeahlian::updateOrCreate(['nomor_ktp' => $request->nomor_ktp1, 'keahlian_nama' => $request->keahlian_nama1],$data);
        return redirect()->back()->withSuccess('Biodata Keahlian berhasil di input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(KeahlianFormRequest $request)
    {
        foreach ($request->id as $key => $value) {
            $data = [
                'keahlian_nama' => $request->keahlian_nama[$key],
                'keahlian_nilai' => $request->keahlian_nilai[$key],
                'nomor_ktp' => $request->nomor_ktp
            ];
            BiodataKeahlian::where('id', $request->id[$key])->update($data);
        }

        return redirect()->back()->withSuccess('Biodata Keahlian berhasil di update');
    }
}
