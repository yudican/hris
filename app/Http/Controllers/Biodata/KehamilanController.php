<?php

namespace App\Http\Controllers\Biodata;

use App\Models\BiodataKtp;
use Illuminate\Http\Request;
use App\Models\BiodataKehamilan;
use App\Http\Controllers\Controller;

class KehamilanController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $nomorKtp = BiodataKtp::where('id', $id)->first()->ktp_nomor;
        return view('user.biodata-kehamilan', [
            'title' => 'Biodata Kehamilan',
            'row' => BiodataKehamilan::where('nomor_ktp', $nomorKtp)->first(),
            'action' => route('biodata_kehamilan.store', ['biodata_kehamilan' => $id]),
            'ktpNomor' =>  $nomorKtp// nomor ktp
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
        $rules = ['kehamilan_status' => 'required']; // rules kehamilan status
        $messages = ['required' => 'Field tidak boleh kosong']; // rules kehamilan status
        $validator = $this->validate($request, $rules, $messages);
        if ($request->kehamilan_status == 'Ya') {
            $rules = ['kehamilan_status' => 'required', 'kehamilan_status' => 'required', 'kehamilan_usia' => 'required', 'kehamilan_akhir' => 'required'];
            $validator = $this->validate($request, $rules, $messages);

            BiodataKehamilan::updateOrCreate(['nomor_ktp' => $id], $request->all());
            return redirect()->route('biodata-keluarga')->withSuccess('Biodata kehamilan berhasil Di input');
        }

        BiodataKehamilan::updateOrCreate(['nomor_ktp' => $id], $request->all());
        return redirect()->route('biodata-keluarga')->withSuccess('Biodata kehamilan berhasil Di input');
    }
}
