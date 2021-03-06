<?php

namespace App\Http\Controllers\Client;

use App\Models\Pelamar;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\LowonganModel;
use App\Models\PerusahaanModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreatePelamarRequest;

class CareerController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Karir',
            'items' => LowonganModel::where('lowongan_status', 'Buka')->get()
        ];
        return view('client.karir', $data);
    }

    public function detail($id)
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
        
        // cek pelamar submit data
        $pelamar = $lowongan->pelamar()->where('pelamar_nik', $request->pelamar_nik)->count();
        if ($pelamar > 0) {
            return redirect()->back()->withError('Anda sudah apply lowongan ini.')->withInput($request->all());
        }

        // cek data pelamar
        
        $dataPelamar = Pelamar::where('pelamar_nik', $request->pelamar_nik)->first();

        // cek data pelamar
        if ($dataPelamar) {
            // cek status pelamar apakah susdah diverifikasi atau belum
            if ($dataPelamar->pelamar_status != 'Ditinjau') {
                // jika sudah
                return redirect()->back()->withError('Maaf anda tidak bisa apply lowongan ini karena lowongan yang sebelumnya anda apply sudah diverifikasi');
            }
        }
        
        // jika data pelamar tidak ada
        if (!$dataPelamar) {
            // upload foto
            $foto = $request->file('pelamar_foto');

            //simpan file ke folder dan ambil nama file
            $file = Storage::putFile('upload/pelamar', $foto);

            $dataStore = [
                'pelamar_foto' => $file,
                'pelamar_status' => 'Ditinjau',
                'pelamar_tanggal' => date('Y-m-d')
            ];

            // terima request dari form kecuali pelamar_tanggal dan pelamar_foto
            $dataStore2 = $request->except(['pelamar_foto']);

            // gabungkan data yang akan disimpan ke database
            $finalData = array_merge($dataStore, $dataStore2);
            $lowongan->pelamar()->create($finalData)->process()->create([
                'proses_ktp' => $request->pelamar_nik,
                'proses_status' => 'Diproses',
                'proses_tanggal' => date('Y-m-d')
            ]);

            return redirect()->route('home')->withSuccess('Apply lowongan berhasil');
        }

        // jika data pelamar sudah ada
        $lowongan->pelamar()->attach($id);
        return redirect()->route('home')->withSuccess('Apply lowongan berhasil');
    }
}
