<?php

namespace App\Http\Controllers\Biodata;

use App\Http\Controllers\Controller;
use App\Models\BiodataKtp;
use App\Models\BiodataTtd;
use App\Models\PostalCode;
use Illuminate\Http\Request;

class TtdController extends Controller
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
        $previews = route('pertanyaan.create', ['pertanyaan' => $id]);
        return view('user.biodata-konfirmasi', [
            'title' => 'Konfirmasi Biodata',
            'row' => BiodataTtd::where('nomor_ktp', $dataKtp->ktp_nomor)->first(),
            'action' => route('biodata-konfirmasi.store', ['biodata_konfirmasi' => $id]),
            'dataKtp' =>  $dataKtp, // nomor ktp
            'previews' => $previews,
            'cities' => PostalCode::groupBy('city')->get()
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
        $validation['bittd_kota'] = 'required';
        $validation['bittd_tanggal'] = 'required';


        $this->validate($request, $validation, $messages);

        $data = [
            'bittd_kota' => $request->bittd_kota,
            'bittd_tanggal' => $request->bittd_tanggal,
            'bittd_nama' => $request->bittd_nama,
            'bittd_persetujuan' => $request->bittd_persetujuan,
            'nomor_ktp' => $request->nomor_ktp,
        ];

        BiodataTtd::updateOrCreate(['nomor_ktp' => $request->nomor_ktp, 'bittd_nama' => $request->bittd_nama], $data);
        return redirect()->back()->withSuccess('Konfirmasi Biodata berhasil di input');
    }
}
