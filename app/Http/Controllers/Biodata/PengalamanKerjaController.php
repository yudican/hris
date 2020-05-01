<?php

namespace App\Http\Controllers\Biodata;

use App\Models\BiodataKtp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BiodataPengalamanKerja;
use App\Http\Requests\PengalamanKerjaFormRequest;

class PengalamanKerjaController extends Controller
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
        $previews = route('biodata-pendidikan.create', ['biodata_pendidikan' => $id]);
        return view('user.biodata-pengalaman-kerja', [
            'title' => 'Biodata Susunan Anak',
            'rows' => BiodataPengalamanKerja::where('nomor_ktp', $dataKtp->ktp_nomor)->get(),
            'action' => route('biodata-pengalaman-kerja.store'),
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
        if ($request->bp_akhir1 != 'Masih Bekerja') {
            if (strtotime('01-'.$request->bp_mulai1) > strtotime('01-'.$request->bp_akhir1)) {
                return redirect()->back()->with('error', 'tanggal yang anda masukkan tidak valid')->withInput($request->all());
            }
        }
        $messages = ['required' => 'Field tidak boleh kosong', 'numeric' => 'field harus berupa angka']; // rules status
        $validation['bp_perusahan1'] = 'required';
        $validation['bp_jabatan1'] = 'required';
        $validation['bp_kota1'] = 'required';
        $validation['bp_mulai1'] = 'required';
        $validation['bp_akhir1'] = 'required';
        $validation['bp_gaji_terakhir1'] = 'required';
        $validation['bp_nama_atasan1'] = 'required';
        $validation['bp_nomor_tlp_atasan1'] = 'required|numeric';
        $validation['bp_jobdesc1'] = 'required';
        $validation['bp_alasan_berhenti1'] = 'required';
        
        $validate = $this->validate($request, $validation, $messages);

        

        $data = [
            'bp_perusahan' => $request->bp_perusahan1,
            'bp_jabatan' => $request->bp_jabatan1,
            'bp_kota' => $request->bp_kota1,
            'bp_mulai' => $request->bp_mulai1,
            'bp_akhir' => $request->bp_akhir1,
            'bp_gaji_terakhir' => $request->bp_gaji_terakhir1,
            'bp_nama_atasan' => $request->bp_nama_atasan1,
            'bp_nomor_tlp_atasan' => $request->bp_nomor_tlp_atasan1,
            'bp_jobdesc' => $request->bp_jobdesc1,
            'bp_alasan_berhenti' => $request->bp_alasan_berhenti1,
            'nomor_ktp' => $request->nomor_ktp1,
        ];

        BiodataPengalamanKerja::updateOrCreate(['nomor_ktp' => $request->nomor_ktp1, 'bp_perusahan' => $request->bp_perusahan1, 'bp_nama_atasan' => $request->bp_nama_atasan1],$data);
        return redirect()->back()->withSuccess('Biodata pengalaman kerja berhasil di input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(PengalamanKerjaFormRequest $request)
    {
        foreach ($request->id as $key => $value) {
            if ($request->bp_akhir[$key] != 'Masih Bekerja') {
                if (strtotime('01-'.$request->bp_mulai[$key]) > strtotime('01-'.$request->bp_akhir[$key])) {
                    return redirect()->back()->with('error', 'tanggal yang anda masukkan tidak valid')->withInput($request->all());
                }
            }
            $data = [
                'bp_perusahan' => $request->bp_perusahan[$key],
                'bp_jabatan' => $request->bp_jabatan[$key],
                'bp_kota' => $request->bp_kota[$key],
                'bp_mulai' => $request->bp_mulai[$key],
                'bp_akhir' => $request->bp_akhir[$key],
                'bp_gaji_terakhir' => $request->bp_gaji_terakhir[$key],
                'bp_nama_atasan' => $request->bp_nama_atasan[$key],
                'bp_nomor_tlp_atasan' => $request->bp_nomor_tlp_atasan[$key],
                'bp_jobdesc' => $request->bp_jobdesc[$key],
                'bp_alasan_berhenti' => $request->bp_alasan_berhenti[$key],
                'nomor_ktp' => $request->nomor_ktp,
            ];

            BiodataPengalamanKerja::where('id', $request->id[$key])->update($data);
        }

        return redirect()->back()->withSuccess('Biodata pengalaman kerja berhasil di update');
    }
}
