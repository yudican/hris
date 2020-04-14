<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePelamarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'pelamar_nik' => 'required|numeric|digits:16',
            'pelamar_nama' => 'required',
            'pelamar_rt' => 'required|numeric',
            'pelamar_rw' => 'required|numeric',
            'pelamar_provinsi' => 'required',
            'pelamar_kabupaten' => 'required',
            'pelamar_kecamatan' => 'required',
            'pelamar_kelurahan' => 'required',
            'pelamar_kodepos' => 'required',
            'pelamar_alamat' => 'required',
            'pelamar_hp' => 'required|numeric',
            'pelamar_email' => 'required|email:rfc,dns',
            'pelamar_major' => 'required',
            'pelamar_jurusan' => 'required',
            'pelamar_foto' => 'required|image|max:2048',
            'pelamar_tanggal_lahir' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'pelamar_nik.required' => 'Nomor Nik tidak boleh kosong',
            'pelamar_nik.numeric' => 'Nomor Nik harus berupa angka',
            'pelamar_nik.digits' => 'Nomor Nik harus 16 digits angka',
            'pelamar_nama.required' => 'nama lengkap tidak boleh kosong',
            'pelamar_rt.required' => 'RT tidak boleh kosong',
            'pelamar_rt.numeric' => 'RT harus berupa angka',
            'pelamar_rw.required' => 'RW tidak boleh kosong',
            'pelamar_rw.numeric' => 'RW harus berupa angka',
            'pelamar_provinsi.required' => 'provinsi tidak boleh kosong',
            'pelamar_kabupaten.required' => 'kabupaten/kota tidak boleh kosong',
            'pelamar_kecamatan.required' => 'kecamatan tidak boleh kosong',
            'pelamar_kelurahan.required' => 'desa/kelurahan tidak boleh kosong',
            'pelamar_kodepos.required' => 'kodepos tidak boleh kosong',
            'pelamar_alamat.required' => 'alamat tidak boleh kosong',
            'pelamar_foto.required' => 'foto tidak boleh kosong',
            'pelamar_foto.image' => 'format file foto salah',
            'pelamar_foto.max' => 'ukuran foto maksimal 2048',
            'pelamar_hp.required' => 'nomor telepon/hp tidak boleh kosong',
            'pelamar_hp.numeric' => 'nomor telepon/hp harus berupa angka',
            'pelamar_email.required' => 'email tidak boleh kosong',
            'pelamar_email.email' => 'email yang anda masukkan tidak valid',
            'pelamar_major.required' => 'major tidak boleh kosong',
            'pelamar_jurusan.required' => 'jurusan tidak boleh kosong',
            'pelamar_tanggal_lahir.required' => 'tanggal lahir tidak boleh kosong'
        ];
    }
}
