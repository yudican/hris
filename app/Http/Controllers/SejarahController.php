<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SejarahPerushaan;
use Illuminate\Support\Facades\Storage;

class SejarahController extends Controller
{
    public function index()
    {
        return view('admin.sejarah.index', [
            'tittle' => 'Sejarah Perusahaan',
            'row' => SejarahPerushaan::first(),
        ]);
    }

    public function store(Request $request)
    {
        $messages = ['required' => 'field tidak boleh kosong', 'image' => 'format file harus image'];
        $request->validate(['foto' => 'image', 'isi' => 'required', 'tanggal' => 'required'], $messages);

        $namaFile = '';
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = Storage::exists($request->path_foto);
            if($path){
                Storage::delete($path);
            }
            $namaFile = Storage::putFile('upload/sejarah', $file);
            $data['foto'] = $namaFile;
        }

        $data = [
            'isi' => htmlspecialchars_decode($request->isi),
            'tanggal' => $request->tanggal,
            'status' => $request->status
        ];

        SejarahPerushaan::updateOrCreate(['id' => $request->id], $data);

        return redirect()->back()->withSuccess('Sejarah perusahaan berhasil di input');
    }
}
