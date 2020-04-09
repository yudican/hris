<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LowonganModel as Lowongan;
use App\Http\Requests\CreateLowonganRequest;

class LowonganController extends Controller
{

    
    public function __construct()
    {
        setlocale(LC_TIME, 'Indonesia');
        
        // $this->middleware(['role:super-admin','permission:publish articles|edit articles']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Daftar Lowongan',
            'items' => Lowongan::all(),
            'no' => 1
        ];
        return view('admin.lowongan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'tittle' => 'Buat Lowongan Baru',
            'row' => [],
            'action' => route('lowongan.store'),
            'method' => 'POST'
        ];
        return view('admin.lowongan.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLowonganRequest $request)
    {

        if (strtotime($request->lowongan_tanggal_close) <= strtotime($request->lowongan_tanggal_open)) {
            return redirect()->back()->with('error','Tanggal yang anda masukan tidak valid, mohon diperiksa kembali')->withInput($request->all());
        }

        Lowongan::create($request->all());

        return redirect()->route('lowongan.index')->withSuccess('Lowongan kerja berhasil di input');
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
        $data = [
            'tittle' => 'Edit Lowongan Kerja',
            'row' => Lowongan::find($id),
            'action' => route('lowongan.update', ['lowongan' => $id]),
            'method' => 'PUT'
        ];
        return view('admin.lowongan.form', $data);
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
        if (strtotime($request->lowongan_tanggal_close) <= strtotime($request->lowongan_tanggal_open)) {
            return redirect()->back()->with('error','Tanggal yang anda masukan tidak valid, mohon diperiksa kembali')->withInput($request->all());
        }

        Lowongan::find($id)->update($request->all());

        return redirect()->route('lowongan.index')->withSuccess('Lowongan kerja berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lowongan::find($id)->delete();

        return redirect()->back()->withSuccess('Lowongan kerja berhasil di hapus');
    }
}
