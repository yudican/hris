<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BiodataKtpFormmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if (auth()->user()->roles()) {
        //     # code...
        // }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ktp_nomor' => 'required|digits:16',
            'ktp_nama' => 'required',
            'ktp_tmp_lahir' => 'required',
            'ktp_tgl_lahir' => 'required',
            'ktp_gender' => 'required',
            'ktp_gol_darah' => 'required',
            'ktp_alamat' => 'required',
            'ktp_rt' => 'required|numeric',
            'ktp_rw' => 'required|numeric',
            'ktp_kelurahan' => 'required',
            'ktp_kecamatan' => 'required',
            'ktp_kabupaten' => 'required',
            'ktp_propinsi' => 'required',
            'ktp_agama' => 'required',
            'ktp_pekerjaan' => 'required',
            'ktp_kewarganegaraan' => 'required',
            'ktp_perkawinan' => 'required',
            'ktp_tinggi_badan' => 'required|numeric',
            'ktp_berat_badan' => 'required|numeric',
        ];
    }

    /**
     * Get the cosntum validation messages.
     *
     * @return array
     */

    public function messages()
    {
        return[
            'ktp_nomor.required' => 'field tidak boleh kosong', 
            'ktp_nomor.digits' => 'nomor ktp harus berisi 16 karakter', 
            'ktp_nama.required' => 'field tidak boleh kosong', 
            'ktp_tmp_lahir.required' => 'field tidak boleh kosong', 
            'ktp_tgl_lahir.required' => 'field tidak boleh kosong', 
            'ktp_gender.required' => 'field tidak boleh kosong', 
            'ktp_gol_darah.required' => 'field tidak boleh kosong', 
            'ktp_alamat.required' => 'field tidak boleh kosong', 
            'ktp_rt.required' => 'field tidak boleh kosong', 
            'ktp_rt.numeric' => 'field harus berupa angka', 
            'ktp_rw.required' => 'field tidak boleh kosong', 
            'ktp_rw.numeric' => 'field harus berupa angka', 
            'ktp_kelurahan.required' => 'field tidak boleh kosong', 
            'ktp_kecamatan.required' => 'field tidak boleh kosong', 
            'ktp_kabupaten.required' => 'field tidak boleh kosong', 
            'ktp_propinsi.required' => 'field tidak boleh kosong', 
            'ktp_agama.required' => 'field tidak boleh kosong', 
            'ktp_pekerjaan.required' => 'field tidak boleh kosong', 
            'ktp_kewarganegaraan.required' => 'field tidak boleh kosong', 
            'ktp_perkawinan.required' => 'field tidak boleh kosong', 
            'ktp_tinggi_badan.required' => 'field tidak boleh kosong', 
            'ktp_berat_badan.required' => 'field tidak boleh kosong', 
            'ktp_tinggi_badan.numeric' => 'field harus berupa angka', 
            'ktp_berat_badan.numeric' => 'field harus berupa angka', 
        ];
    }
}
