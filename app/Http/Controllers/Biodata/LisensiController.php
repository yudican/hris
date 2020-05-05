<?php

namespace App\Http\Controllers\Biodata;

use App\Http\Controllers\Controller;
use App\Http\Requests\LisensiFormRequest;
use App\Models\BiodataKtp;
use App\Models\BiodataLisensi;
use Illuminate\Http\Request;

class LisensiController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $dataKtp = BiodataKtp::where('id', $id)->first();
        $previews = route('biodata-informasi.create', ['biodata_informasi' => $id]);
        return view('user.biodata-lisensi', [
            'title' => 'Biodata lisensi',
            'rows' => BiodataLisensi::where('nomor_ktp', $dataKtp->ktp_nomor)->get(),
            'action' => route('biodata-lisensi.store'),
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
        $validation['bil_kategori1'] = 'required';
        $validation['bil_jenis1'] = 'required';
        $validation['bil_nomor1'] = 'required|numeric';

        $validate = $this->validate($request, $validation, $messages);

        $data = [
            'bil_kategori' => $request->bil_kategori1,
            'bil_jenis' => $request->bil_jenis1,
            'bil_nomor' => $request->bil_nomor1,
            'nomor_ktp' => $request->nomor_ktp1,
        ];

        BiodataLisensi::updateOrCreate(['nomor_ktp' => $request->nomor_ktp1, 'bil_nomor' => $request->bil_nomor1],$data);
        return redirect()->back()->withSuccess('Biodata Lisensi berhasil di input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(LisensiFormRequest $request)
    {
        foreach ($request->id as $key => $value) {
            $data = [
                'bil_kategori' => $request->bil_kategori[$key],
                'bil_jenis' => $request->bil_jenis[$key],
                'bil_nomor' => $request->bil_nomor[$key],
                'nomor_ktp' => $request->nomor_ktp
            ];
            BiodataLisensi::where('id', $request->id[$key])->update($data);
        }

        return redirect()->back()->withSuccess('Biodata Lisensi berhasil di update');
    }
}
