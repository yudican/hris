<?php

namespace App\Http\Controllers\Biodata;

use App\Models\BiodataKtp;
use Illuminate\Http\Request;
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
        return view('user.biodata-kehamilan', [
            'title' => 'Biodata Kehamilan',
            'row' => [],
            'action' => route('biodata_kehamilan.store', ['biodata_kehamilan' => $id]),
            'ktpNomor' => BiodataKtp::where('id', $id)->first()->ktp_nomor // nomor ktp
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
        if ($request->kehamilan_status == 'Ya') {
            $rules = ['kehamilan_status' => 'required', 'kehamilan_usia' => 'required', 'kehamilan_akhir' => 'required'];
            $validator = $this->validate($request, $rules, $messages);

            BiodataKehamilan::updateOrCreate(['nomor_ktp' => $id], $request->all());
            return redirect()->back()->withInput($request->all());
        }

        BiodataKehamilan::updateOrCreate(['nomor_ktp' => $id], $request->all());
        return redirect()->back()->withInput($request->all());
    }
}
