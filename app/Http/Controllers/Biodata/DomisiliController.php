<?php

namespace App\Http\Controllers\Biodata;

use App\Http\Controllers\Controller;
use App\Models\BiodataKtp;
use App\Models\Pelamar;
use App\Models\PostalCode;
use App\Models\Province;
use Illuminate\Http\Request;

class DomisiliController extends Controller
{
    private $cities = [], $districts = [], $urbans = [], $postalKode = [];
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataKtp = BiodataKtp::where('id', $id)->first();
        $previews = route('biodata-keahlian.create', ['biodata_keahlian' => $id]);
        $row = Pelamar::where('pelamar_nik', $dataKtp->ktp_nomor)->first();
        $provinces = Province::where('province_name', $row->pelamar_provinsi)->get();
        $this->districts[] = $this->unique_array($this->wilayah('city', $row->pelamar_kabupaten), 'sub_district');
        $this->urbans[] = $this->unique_array($this->wilayah('sub_district', $row->pelamar_kecamatan), 'urban');
        $this->postalKode[] = $this->unique_array($this->wilayah('urban', $row->pelamar_kelurahan), 'postal_code');
        // cities
        foreach ($provinces as $province) {
            $this->cities[] = $this->unique_array($province->kodepos, 'city');
        }
        return view('user.biodata-domisili', [
            'title' => 'Biodata Domisili',
            'row' => $row,
            'action' => route('biodata-domisili.store', ['biodata_domisili' => $row->id]),
            'dataKtp' =>  $dataKtp, // nomor ktp
            'previews' => $previews,
            'provinces' => Province::all(),
            'cities' => $this->cities[0],
            'districts' => $this->districts[0],
            'urbans' => $this->urbans[0],
            'postalKode' => $this->postalKode[0]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $messages = ['required' => 'Field tidak boleh kosong', 'numeric' => 'field harus berupa angka']; // rules status
        $validation['pelamar_rt'] = 'required|numeric';
        $validation['pelamar_rw'] = 'required|numeric';
        $validation['pelamar_provinsi'] = 'required';
        $validation['pelamar_kabupaten'] = 'required';
        $validation['pelamar_kecamatan'] = 'required';
        $validation['pelamar_kelurahan'] = 'required';
        $validation['pelamar_kodepos'] = 'required';
        $validation['pelamar_alamat'] = 'required';
        $validation['pelamar_tinggal_dengan'] = 'required';
        $validation['pelamar_jenis_tinggal'] = 'required';
        
        $this->validate($request, $validation, $messages);

        
        Pelamar::find($id)->update($request->all());
        // return redirect()->route('biodata-darurat.create', ['biodata_darurat' => $id])->withSuccess('Biodata referensi berhasil di input');
        return redirect()->back()->withSuccess('Biodata Domisili berhasil di update');
    }

    protected function unique_array($array, $key)
    {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

    private function wilayah($parent, $value){
        return PostalCode::where($parent, $value)->get();
    }
}
