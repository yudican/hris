<?php

namespace App\Http\Controllers\Biodata;

use App\Models\BiodataKtp;
use Illuminate\Http\Request;
use App\Models\BiodataSusunanAnak;
use App\Http\Controllers\Controller;
use App\Http\Requests\SusunanAnakFormRequest;

class SusunanAnakController extends Controller
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
        $previews = route('biodata-ortu.create', ['biodata_ortu' => $id]);
        return view('user.biodata-susunan-anak', [
            'title' => 'Biodata Susunan Anak',
            'rows' => BiodataSusunanAnak::where('nomor_ktp', $dataKtp->ktp_nomor)->get(),
            'action' => route('biodata-susunan-anak.store'),
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
        $validation['bsa_nama1'] = 'required';
        $validation['bsa_jenis_anak1'] = 'required';
        $validation['bsa_tanggal_lahir1'] = 'required';
        $validation['bsa_pekerjaan1'] = 'required';
        $validation['bsa_pendidikan1'] = 'required';
        $validation['bsa_alamat1'] = 'required';
        $validation['bsa_nomor_hp1'] = 'required|numeric';
        $validation['bsa_perkawinan1'] = 'required';
        if ($request->bsa_perkawinan1 == 'Kawin') {
            $validation['bsap_jenis1'] = 'required';
            $validation['bsap_nama1'] = 'required';
            $validation['bsap_pekerjaan1'] = 'required';
            $validation['bsap_nomor_hp1'] = 'required|numeric';
        }
        $this->validate($request, $validation, $messages);

        $data = [
            'bsa_nama' => $request->bsa_nama1,
            'bsa_jenis_anak' => $request->bsa_jenis_anak1,
            'bsa_tanggal_lahir' => $request->bsa_tanggal_lahir1,
            'bsa_pekerjaan' => $request->bsa_pekerjaan1,
            'bsa_pendidikan' => $request->bsa_pendidikan1,
            'bsa_alamat' => $request->bsa_alamat1,
            'bsa_nomor_hp' => $request->bsa_nomor_hp1,
            'bsa_perkawinan' => $request->bsa_perkawinan1,
            'bsap_jenis' => $request->bsap_jenis1,
            'bsap_nama' => $request->bsap_nama1,
            'bsap_pekerjaan' => $request->bsap_pekerjaan1,
            'bsap_nomor_hp' => $request->bsap_nomor_hp1,
            'nomor_ktp' => $request->nomor_ktp1,
        ];

        BiodataSusunanAnak::updateOrCreate(['nomor_ktp' => $request->nomor_ktp1, 'bsa_nama' => $request->bsa_nama1, 'bsa_nomor_hp' => $request->bsa_nomor_hp1],$data);
        return redirect()->back()->withSuccess('Biodata susunan anak berhasil di input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(SusunanAnakFormRequest $request)
    {
        foreach ($request->id as $key => $value) {
            $data = [
                'bsa_nama' => $request->bsa_nama[$key],
                'bsa_jenis_anak' => $request->bsa_jenis_anak[$key],
                'bsa_tanggal_lahir' => $request->bsa_tanggal_lahir[$key],
                'bsa_pekerjaan' => $request->bsa_pekerjaan[$key],
                'bsa_pendidikan' => $request->bsa_pendidikan[$key],
                'bsa_alamat' => $request->bsa_alamat[$key],
                'bsa_nomor_hp' => $request->bsa_nomor_hp[$key],
                'bsa_perkawinan' => $request->bsa_perkawinan[$key],
                'bsap_jenis' => $request->bsa_perkawinan[$key] == 'Kawin' ? $request->bsap_jenis[$key] : null,
                'bsap_nama' => $request->bsa_perkawinan[$key] == 'Kawin' ? $request->bsap_nama[$key] : null,
                'bsap_pekerjaan' => $request->bsa_perkawinan[$key] == 'Kawin' ? $request->bsap_pekerjaan[$key] : null,
                'bsap_nomor_hp' => $request->bsa_perkawinan[$key] == 'Kawin' ? $request->bsap_nomor_hp[$key] : null,
                'nomor_ktp' => $request->nomor_ktp,
            ];

            BiodataSusunanAnak::where('id', $request->id[$key])->update($data);
        }

        return redirect()->back()->withSuccess('Biodata susunan anak berhasil di update');
    }
}
