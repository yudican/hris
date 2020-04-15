<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PerusahaanFormRequest;
use App\Models\PerusahaanModel as Perusahaan;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Profile Perusahaan Dashboard',
            'row' => Perusahaan::first(),
            'provinces' => Province::all()
        ];
        return view('admin.perusahaan_profile', $data);
    }

    public function store(PerusahaanFormRequest $req)
    {
        // $this->validate( $request, $rules, $request->messages());
        $files = $req->file();
 
        $dataStoreImages = [];
        if ($files) {
            foreach ($files as $key => $file) {
                $dataStoreImages[$key] = Storage::putFile('upload/web', $file);
                switch ($key) {
                    case 'perusahaan_logo':
                        $this->deleteFile($req->logo);
                        break;
                    case 'perusahaan_favicon':
                        $this->deleteFile($req->favicon);
                        break;
                }
            }
        }

        $dataStore = $req->except(['perusahaan_logo', 'perusahaan_favicon', 'id', 'logo', 'favicon']);

        $finalData = array_merge($dataStore, $dataStoreImages);

        if ($req->id) {
            Perusahaan::find($req->id)->update($finalData);
        }else{
            Perusahaan::create($finalData);
        }
        
        return redirect()->back()->withSuccess('Pengaturan profile prusahaan berhasil');
    }

    protected function deleteFile($path){
        $ifFileExists = Storage::disk('public')->exists($path);
        if ($ifFileExists) {
           return Storage::delete($path);
        }
        return false;
    }


}
