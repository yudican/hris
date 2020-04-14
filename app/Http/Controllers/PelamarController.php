<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use Illuminate\Http\Request;
use App\Models\LowonganPelamar;

class PelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->segment(3) ? $request->segment(3) : 'Ditinjau';
        $data = [
            'title' => 'Daftar Lamaran '.$params,
            'no' => 1,
            'params' => $params
        ];

        return view('admin.pelamar.index', $data);
    }

    /**
     * Show the  .
     *
     * @return \Illuminate\Http\Response
     */
    public function json(Request $request,$type)
    {
        if ($request->ajax()) {
            $lowonganPelamar = LowonganPelamar::join('pelamar', 'lowongan_pelamar.pelamar_id', '=', 'pelamar.id')
                            ->join('lowongan', 'lowongan_pelamar.lowongan_id', '=', 'lowongan.id')
                            ->where('pelamar.pelamar_status', $type)
                            ->get();

            return datatables()->of($lowonganPelamar)
                ->editColumn('pelamar_nik', function($pelamar){
                    foreach ($pelamar->pelamar as $pel) {
                        return $pel->pelamar_nik;
                    }
                })
                ->editColumn('pelamar_nama', function($pelamar){
                    foreach ($pelamar->pelamar as $pel) {
                        return $pel->pelamar_nama;
                    }
                })
                ->editColumn('pelamar_email', function($pelamar){
                    foreach ($pelamar->pelamar as $pel) {
                        return $pel->pelamar_email;
                    }
                })
                ->addColumn('action', function($pelamar){
                    return view('components.action-pelamar-button', ['data' => $pelamar]);
                })
                ->addColumn('jabatan', function($pelamar){
                    $lowongan = '';
                    foreach ($pelamar->lowongan as $pel) {
                        $lowongan .= $pel->lowongan_bagian;
                    }
                    return $lowongan;
                })
                ->editColumn('pelamar_foto', function($pelamar){
                    foreach ($pelamar->pelamar as $pel) {
                        return view('components.show-image', ['data' => $pel]);
                    }
                })
                ->toJson();
        }

        return abort(405);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lowongan = Pelamar::with('lowongan')->where('pelamar_nik', $id)->first();
        if (!$lowongan) {
            return abort(404);
        }
        // dd($lowongan);
        $data = [
            'title' => 'Detail Pelamar',
            'data' => $lowongan
        ];

        return view('admin.pelamar.show', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Pelamar::findOrFail($id)->update(['pelamar_status' => $request->status]);

        return redirect()->route('pelamar.index')->withSuccess('Email Pemberitahuan Calon Karyawan Berhasil Dikirim');
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
