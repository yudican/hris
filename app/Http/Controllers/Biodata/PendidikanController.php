<?php

namespace App\Http\Controllers\Biodata;

use App\Models\BiodataKtp;
use Illuminate\Http\Request;
use App\Models\BiodataPendidikan;
use App\Http\Controllers\Controller;

class PendidikanController extends Controller
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
        return view('user.biodata-pendidikan', [
            'title' => 'Biodata Pendidikan',
            'rows' => BiodataPendidikan::where('nomor_ktp', $dataKtp->ktp_nomor)->get(),
            'action' => route('biodata-pendidikan.store'),
            'dataKtp' =>  $dataKtp, // nomor ktp
            'previews' => $previews,
            'no' => 0
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
        // validate two date
        if (intval($request->pendidikan_mulai1) > intval($request->pendidikan_lulus1)) {
            return redirect()->back()->with('error', 'tanggal yang anda masukkan tidak valid')->withInput($request->all());
        }

        $messages = ['required' => 'Field tidak boleh kosong', 'numeric' => 'field harus berupa angka', 'between' => 'nilai IPK maksimum 4']; // rules kehamilan status
        $validation['pendidikan_jenjang1'] = 'required';
        if ($request->pendidikan_jenjang1) {
            if ($request->pendidikan_jenjang1 == 'SD' || $request->pendidikan_jenjang1 == 'SMP/MTS') {
                $validation['pendidikan_nama1'] = 'required';
                $validation['pendidikan_kota1'] = 'required';
                $validation['pendidikan_mulai1'] = 'required|numeric';
                $validation['pendidikan_lulus1'] = 'required|numeric';
            }else if ($request->pendidikan_jenjang1 == 'SMA/SMK/MA') {
                $validation['pendidikan_nama1'] = 'required';
                $validation['pendidikan_kota1'] = 'required';
                $validation['pendidikan_mulai1'] = 'required|numeric';
                $validation['pendidikan_lulus1'] = 'required|numeric';
                $validation['pendidikan_jurusan1'] = 'required';
            }else{
                $validation['pendidikan_nama1'] = 'required';
                $validation['pendidikan_kota1'] = 'required';
                $validation['pendidikan_jurusan1'] = 'required';
                $validation['pendidikan_fakultas1'] = 'required';
                $validation['pendidikan_mulai1'] = 'required|numeric';
                $validation['pendidikan_lulus1'] = 'required|numeric';
                $validation['pendidikan_ipk1'] = 'required|numeric|between:0.0,4.0';
            }
        }
        $this->validate($request, $validation, $messages);

        $data = [
            'pendidikan_nama' => $request->pendidikan_nama1,
            'pendidikan_kota' => $request->pendidikan_kota1,
            'pendidikan_jurusan' => $request->pendidikan_jurusan1,
            'pendidikan_fakultas' => $request->pendidikan_fakultas1,
            'pendidikan_jenjang' => $request->pendidikan_jenjang1,
            'pendidikan_mulai' => $request->pendidikan_mulai1,
            'pendidikan_lulus' => $request->pendidikan_lulus1,
            'pendidikan_ipk' => $request->pendidikan_ipk1,
            'nomor_ktp' => $request->nomor_ktp1,
        ];

        BiodataPendidikan::updateOrCreate(['nomor_ktp' => $request->nomor_ktp1, 'pendidikan_jenjang' => $request->pendidikan_jenjang1],$data);
        return redirect()->back()->withSuccess('Biodata pendidikan berhasil di input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        foreach ($request->id as $key => $value) {
            if (intval($request->pendidikan_mulai[$key]) > intval($request->pendidikan_lulus[$key])) {
                return redirect()->back()->with('error', 'tanggal yang anda masukkan tidak valid');
            }
            $validation['pendidikan_jenjang.*'] = 'required';
            if ($request->pendidikan_jenjang) {
                if ($request->pendidikan_jenjang[$key] == 'SD' || $request->pendidikan_jenjang[$key] == 'SMP/MTS') {
                    $validation['pendidikan_nama.*'] = 'required';
                    $validation['pendidikan_kota.*'] = 'required';
                    $validation['pendidikan_mulai.*'] = 'required|numeric';
                    $validation['pendidikan_lulus.*'] = 'required|numeric';
                }else if ($request->pendidikan_jenjang[$key] == 'SMA/SMK/MA') {
                    $validation['pendidikan_nama.*'] = 'required';
                    $validation['pendidikan_kota.*'] = 'required';
                    $validation['pendidikan_mulai.*'] = 'required|numeric';
                    $validation['pendidikan_lulus.*'] = 'required|numeric';
                    $validation['pendidikan_jurusan.*'] = 'required';
                }else{
                    $validation['pendidikan_nama.*'] = 'required';
                    $validation['pendidikan_kota.*'] = 'required';
                    $validation['pendidikan_jurusan.*'] = 'required';
                    $validation['pendidikan_fakultas.*'] = 'required';
                    $validation['pendidikan_mulai.*'] = 'required|numeric';
                    $validation['pendidikan_lulus.*'] = 'required|numeric';
                    $validation['pendidikan_ipk.*'] = 'required|numeric|between:0.0,4.0';
                }
            }
            $data = [
                'pendidikan_nama' => $request->pendidikan_nama[$key],
                'pendidikan_kota' => $request->pendidikan_kota[$key],
                'pendidikan_jurusan' => $request->pendidikan_jurusan[$key],
                'pendidikan_fakultas' => $request->pendidikan_fakultas[$key],
                'pendidikan_jenjang' => $request->pendidikan_jenjang[$key],
                'pendidikan_mulai' => $request->pendidikan_mulai[$key],
                'pendidikan_lulus' => $request->pendidikan_lulus[$key],
                'pendidikan_ipk' => $request->pendidikan_ipk[$key],
                'nomor_ktp' => $request->nomor_ktp,
            ];

            BiodataPendidikan::where('id', $request->id[$key])->update($data);
        }

        return redirect()->back()->withSuccess('Biodata pendidikan berhasil di update');
    }
}
