<?php

namespace App\Http\Controllers\Biodata;

use Ramsey\Uuid\Uuid;
use App\Models\Province;
use App\Models\BiodataKtp;
use Illuminate\Http\Request;
use App\Models\BiodataKehamilan;
use App\Http\Controllers\Controller;
use App\Http\Requests\BiodataKtpFormmRequest;

class KtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.biodata-ktp', [
            'title' => 'Masukkan Biodata KTP',
            'provinces' => Province::all(),
            'action' => route('biodata-ktp.store'),
            'row' => [],
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

        BiodataKehamilan::updateOrCreate(['nomor_ktp' => $request->ktp_nomor, 'kehamilan_status' => 'Tidak']);
        return redirect()->route('biodata_keluarga.create', ['biodata_keluarga' => $id])->withSuccess('Data Ktp Berhasil Di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $uuid = Uuid::uuid4()->toString(); // generate uuid
        $data = array_merge($request->except(['_token', '_method']), ['id' => $uuid]);
        BiodataKtp::where('id', $id)->update($data);

        return redirect()->route('biodata_kehamilan.create', ['biodata_kehamilan' => $uuid])->withSuccess('Data Ktp Berhasil Di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
