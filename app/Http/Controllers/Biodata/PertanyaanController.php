<?php

namespace App\Http\Controllers\Biodata;

use App\Http\Controllers\Controller;
use App\Models\BiodataJawaban;
use App\Models\BiodataKtp;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $dataKtp = BiodataKtp::where('id', $id)->first();
        $pertanyaan = Pertanyaan::with(['jawaban' => function ($query) use ($dataKtp) {
            $query->where('nomor_ktp', $dataKtp->ktp_nomor);
        }])->get();
        $previews = route('biodata-lisensi.create', ['biodata_lisensi' => $id]);
        return view('user.biodata-pertanyaan', [
            'title' => 'Pertanyaan',
            'rows' => $pertanyaan,
            'action' => route('pertanyaan.store'),
            'dataKtp' =>  $dataKtp, // nomor ktp
            'previews' => $previews,
            'no' => 1
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, ['jawaban_pertanyaan.*' => 'required'], ['required' => 'field tidak boleh kosong']);
        BiodataJawaban::where('nomor_ktp', $request->nomor_ktp)->delete();
        foreach ($request->id as $key => $value) {
            Pertanyaan::find($request->id[$key])->jawaban()->create([
                'jawaban_pertanyaan' => $request->jawaban_pertanyaan[$key],
                'nomor_ktp' => $request->nomor_ktp,
            ]);
        }

        return redirect()->back();
    }
}
