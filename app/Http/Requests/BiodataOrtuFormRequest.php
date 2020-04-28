<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BiodataOrtuFormRequest extends FormRequest
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
            'ortu_jenis.*' => 'required',
            'ortu_nama.*' => 'required',
            'ortu_tanggal_lahir.*' => 'required',
            'ortu_lulusan.*' => 'required',
            'ortu_alamat.*' => 'required',
            'ortu_rt.*' => 'required|numeric',
            'ortu_rw.*' => 'required|numeric',
            'ortu_kelurahan.*' => 'required',
            'ortu_kecamatan.*' => 'required',
            'ortu_kabupaten.*' => 'required',
            'ortu_propinsi.*' => 'required',
            'ortu_pekerjaan.*' => 'required'
        ];
    }

    /**
     * Get the validation costum messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'ortu_jenis.*.required' => 'field tidak boleh kosong',
            'ortu_nama.*.required' => 'field tidak boleh kosong',
            'ortu_tanggal_lahir.*.required' => 'field tidak boleh kosong',
            'ortu_lulusan.*.required' => 'field tidak boleh kosong',
            'ortu_alamat.*.required' => 'field tidak boleh kosong',
            'ortu_rt.*.required' => 'field tidak boleh kosong',
            'ortu_rw.*.required' => 'field tidak boleh kosong',
            'ortu_rt.*.numeric' => 'field harus berupa angka',
            'ortu_rw.*.numeric' => 'field harus berupa angka',
            'ortu_kelurahan.*.required' => 'field tidak boleh kosong',
            'ortu_kecamatan.*.required' => 'field tidak boleh kosong',
            'ortu_kabupaten.*.required' => 'field tidak boleh kosong',
            'ortu_propinsi.*.required' => 'field tidak boleh kosong',
            'ortu_pekerjaan.*.required' => 'field tidak boleh kosong'
        ];
    }
}
