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
    public function index()
    {
        $data = [
            'title' => 'Daftar Lamaran Masuk',
            'no' => 1
        ];

        return view('admin.pelamar.index', $data);
    }

    /**
     * Show the  .
     *
     * @return \Illuminate\Http\Response
     */
    public function json($type)
    {
        $pelamars = Pelamar::with('lowongan')->where('pelamar_status', 'Ditinjau')->get(['id', 'pelamar_nik', 'pelamar_nama', 'pelamar_email', 'pelamar_foto']);
        $lp = LowonganPelamar::with('pelamar')->with('lowongan')->get();
        return datatables()->of($lp)
            ->editColumn('id', function($pelamar){
                foreach ($pelamar->pelamar as $pel) {
                    return $pel->id;
                }
            })
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
                foreach ($pelamar->lowongan as $low) {
                    return $low->lowongan_bagian;
                }
            })
            ->editColumn('pelamar_foto', function($pelamar){
                foreach ($pelamar->pelamar as $pel) {
                    return view('components.show-image', ['data' => $pel]);
                }
            })
            ->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lowongan = Pelamar::with('lowongan')->findOrFail($id);
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
        Pelamar::findOrFail($id)->update(['pelamar_status' => 'Dipanggil']);

        return redirect()->route('pelamar.index')->withSuccess('Email Pemanggilan Calon Karyawan Berhasil Dikirim');
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
