<?php

namespace App\Http\Controllers\Biodata;

use App\Models\Province;
use App\Models\BiodataKtp;
use Illuminate\Http\Request;
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
        BiodataKtp::firstOrCreate(['ktp_nomor' => $request->ktp_nomor], $request->all());

        return redirect()->back()->withSuccess('Data Ktp Berhasil Di input');
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
        return view('user.biodata-ktp', [
            'title' => 'Biodata KTP',
            'provinces' => Province::all(),
            'action' => route('biodata-ktp.update', ['biodata_ktp' => $id]),
            'row' => BiodataKtp::findOrFail($id),
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
        BiodataKtp::find($id)->update($request->all());

        return redirect()->back()->withSuccess('Data Ktp Berhasil Di update');
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
