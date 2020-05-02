<?php

namespace App\Http\Controllers\Biodata;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Pelamar;
use App\Models\Province;
use App\Models\BiodataKtp;
use Illuminate\Http\Request;
use App\Models\BiodataKeluarga;
use App\Models\BiodataKehamilan;
use App\Http\Controllers\Controller;
use App\Http\Requests\BiodataKtpFormmRequest;

class KtpController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nik = auth()->user()->pelamar->pelamar_nik;
        $userKtp = BiodataKtp::where('ktp_nomor', $nik)->first();
        return view('user.biodata-ktp', [
            'title' => 'Masukkan Biodata KTP',
            'provinces' => Province::all(),
            'action' => route('biodata-ktp.store'),
            'nik' => $nik,
            'row' => $userKtp,
            'method' => 'POST'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\BiodataKtpFormmRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BiodataKtpFormmRequest $request)
    {
        $id = Uuid::uuid4()->toString();
        $data = array_merge($request->all(), ['id' => $id]);
        BiodataKtp::updateOrCreate(['ktp_nomor' => $request->ktp_nomor], $data);

        if ($request->ktp_gender == 'Perempuan' && $request->ktp_perkawinan == 'Kawin') {
            return redirect()->route('biodata_kehamilan.create', ['biodata_kehamilan' => $id])->withSuccess('Data Ktp Berhasil Di input');
        }

        // jika status perkawinan Belum kawin
        // redirect ke halaman keluarga
        if ($request->ktp_perkawinan == 'Belum Kawin') {
            BiodataKeluarga::create(['nomor_ktp' => $request->ktp_nomor]);
            return redirect()->back()->withInput();
            // return redirect()->route('biodata_kehamilan.create', ['biodata_kehamilan' => $uuid])->withSuccess('Data Ktp Berhasil Di Update');
        }

        BiodataKehamilan::updateOrCreate(['nomor_ktp' => $request->ktp_nomor, 'kehamilan_status' => 'Tidak']);
        return redirect()->route('biodata-keluarga.create', ['biodata_keluarga' => $id])->withSuccess('Data Ktp Berhasil Di input');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = BiodataKtp::where('id', $id)->first();
        if (!$row) {
            return abort(404);
        }
        return view('user.biodata-ktp', [
            'title' => 'Biodata KTP',
            'provinces' => Province::all(),
            'action' => route('biodata-ktp.update', ['biodata_ktp' => $id]),
            'row' => $row,
            'method' => 'PUT'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\BiodataKtpFormmRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BiodataKtpFormmRequest $request, $id)
    {
        BiodataKtp::where('id', $id)->update($request->all());


        // jika jenis kelamin perempuan dan status perkawinan menikah
        // redirect ke form kehamilan
        if ($request->ktp_gender == 'Perempuan' && $request->ktp_perkawinan == 'Kawin') {
            return redirect()->route('biodata_kehamilan.create', ['biodata_kehamilan' => $id])->withSuccess('Data Ktp Berhasil Di Update');
        }
        
        // jika status perkawinan Belum kawin
        // redirect ke halaman keluarga
        if ($request->ktp_perkawinan == 'Belum Kawin') {
            BiodataKeluarga::create(['nomor_ktp' => $request->ktp_nomor]);
            return redirect()->back()->withInput();
            // return redirect()->route('biodata_kehamilan.create', ['biodata_kehamilan' => $uuid])->withSuccess('Data Ktp Berhasil Di Update');
        }
        

        BiodataKehamilan::updateOrCreate(['nomor_ktp' => $request->ktp_nomor, 'kehamilan_status' => 'Tidak']);
        return redirect()->route('biodata-keluarga.create', ['biodata_keluarga' => $id])->withSuccess('Data Ktp Berhasil Di Update');
    }

}
