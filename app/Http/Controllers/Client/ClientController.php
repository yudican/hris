<?php

namespace App\Http\Controllers\Client;

use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\LowonganModel;
use App\Models\PerusahaanModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreatePelamarRequest;

class ClientController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Selamat Datang',
            'data' => PerusahaanModel::first()
        ];
        return view('client.index', $data);
    }

    public function karir()
    {
        $data = [
            'title' => 'Karir',
            'items' => LowonganModel::all()
        ];
        return view('client.karir', $data);
    }

    public function karir_detail($id)
    {
        $data = [
            'title' => 'Karir',
            'karir' => LowonganModel::findOrFail($id),
            'data' => PerusahaanModel::first()
        ];
        return view('client.karir_detail', $data);
    }

    public function apply($id, $title='')
    {
        LowonganModel::findOrFail($id);
        $data = [
            'title' => 'Apply Lowongan '.$title,
            'provinces' => Province::all(),
        ];
        return view('client.apply', $data);
    }

    // CreatePelamarRequest $request
    public function store(CreatePelamarRequest $request, $id)
    {
        $lowongan = LowonganModel::findOrFail($id);
        
        // upload foto
        $foto = $request->file('pelamar_foto');

        //simpan file ke folder dan ambil nama file
        $file = Storage::putFile('upload/pelamar', $foto);

        // $pelamar = Pelamar::where('pelamar_nik', $request->pelamar_nik)->first();
        // if ($pelamar->pelamar_nik) {
        //     return redirect()->route('home')->withSuccess('Apply lowongan berhasil');
        // }
        $dataStore = [
            'pelamar_foto' => $file,
            'pelamar_status' => 'Ditinjau',
            'pelamar_tanggal' => date('Y-m-d')
        ];

        // terima request dari form kecuali pelamar_tanggal dan pelamar_foto
        $dataStore2 = $request->except(['pelamar_foto']);

        // gabungkan data yang akan disimpan ke database
        $finalData = array_merge($dataStore, $dataStore2);

        // cek pelamar submit data
        $pelamar = $lowongan->pelamar()->where('pelamar_nik', $request->pelamar_nik)->count();
        if ($pelamar > 0) {
            return redirect()->back()->withError('Anda sudah apply lowongan ini.');
        }
        $lowongan->pelamar()->create($finalData);

        return redirect()->route('home')->withSuccess('Apply lowongan berhasil');
    }
}
