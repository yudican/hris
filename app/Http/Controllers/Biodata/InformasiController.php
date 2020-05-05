<?php

namespace App\Http\Controllers\Biodata;

use App\Http\Controllers\Controller;
use App\Models\BiodataInformasi;
use App\Models\BiodataKtp;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $dataKtp = BiodataKtp::where('id', $id)->first();
        $previews = route('biodata-domisili.show', ['biodata_domisili' => $id]);
        $row = BiodataInformasi::where('nomor_ktp', $dataKtp->ktp_nomor)->first();
        return view('user.biodata-informasi', [
            'title' => 'Informasi Akun Sosial Media',
            'row' => $row,
            'action' => route('biodata-informasi.store'),
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
        $validation = ['bioin_email' => 'nullable|email:rfc,dns', 'bioin_whatsapp' => 'nullable|numeric'];
        $messages = ['email' => 'Silahkan masukkan email yang valid', 'numeric' => 'field harus berupa angka'];
        $this->validate($request, $validation, $messages);
        $data = [
            'bioin_facebook' => $request->bioin_facebook,
            'bioin_instagram' => $request->bioin_instagram,
            'bioin_twitter' => $request->bioin_twitter,
            'bioin_linkedin' => $request->bioin_linkedin,
            'bioin_email' => $request->bioin_email,
            'bioin_whatsapp' => $request->bioin_whatsapp,
            'nomor_ktp' => $request->nomor_ktp,
        ];

        BiodataInformasi::updateOrCreate(['nomor_ktp' => $request->nomor_ktp],$data);
        // return redirect()->route('biodata-darurat.create', ['biodata_darurat' => $id])->withSuccess('Biodata informasi berhasil di input');
        return redirect()->back()->withSuccess('Biodata informasi berhasil di input');
    }
}
