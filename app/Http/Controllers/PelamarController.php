<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use Illuminate\Http\Request;

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
            'lists' => Pelamar::whereNull('pelamar_status')->get(),
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
        $pelamars = Pelamar::whereNull('pelamar_status')->get(['id', 'pelamar_nik', 'pelamar_nama', 'pelamar_email', 'pelamar_major', 'pelamar_foto']);
        return datatables()->of($pelamars)
            ->addColumn('action', function($pelamar){
                return view('components.action-pelamar-button', ['data' => $pelamar]);
            })
            ->editColumn('pelamar_foto', function($pelamar){
                return view('components.show-image', ['data' => $pelamar]);
            })
            ->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
