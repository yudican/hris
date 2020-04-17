<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelamar;
use Illuminate\Http\Request;
use App\Models\LowonganPelamar;
use App\Models\PerusahaanModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        try{
            $perusahaan = PerusahaanModel::first();
            $pelamar = Pelamar::findOrFail($id);
            $pelamar->update(['pelamar_status' => $request->status]);

            if ($request->status == 'Ditolak') {
                $data = [
                    'name' => $pelamar->pelamar_nama,
                    'data' => $perusahaan,
                ];
                Mail::send('email.reject', $data, function ($message) use ($pelamar)
                {
                    $message->subject('MSD HRIS - Biodata Pelamar');
                    $message->from('careers@msdhris.com', 'Careers');
                    $message->to($pelamar->pelamar_email);
                });
                return redirect()->route('pelamar.index')->withSuccess('Email Pemberitahuan Calon Karyawan Berhasil Dikirim');
            }

            // generate password
            $password = str_replace('.', '', explode('@', $pelamar->pelamar_email)[0].rand(1,999));

            // create new user
            $user = User::updateOrCreate([
                'email' => $pelamar->pelamar_email
            ],[
                'name' => $pelamar->pelamar_nama,
                'email' => $pelamar->pelamar_email,
                'password' => Hash::make($password)
            ]);

            $user->assignRole('user');

            // send data to page
            $data = [
                'name' => $pelamar->pelamar_nama,
                'username' => $pelamar->pelamar_email,
                'password' => $password,
                'data' => $perusahaan,
                'action_url' => route('login')
            ];
            Mail::send('email.accept', $data, function ($message) use ($pelamar)
            {
                $message->subject('MSD HRIS - Biodata Pelamar');
                $message->from('careers@msdhris.com', 'Careers');
                $message->to($pelamar->pelamar_email);
            });
            return redirect()->route('pelamar.index')->withSuccess('Email Pemberitahuan Calon Karyawan Berhasil Dikirim');
        }
        catch (Exception $e){
            return redirect()->route('pelamar.index')->withError($e->getMessage());
        }
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
