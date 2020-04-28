<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BiodataKeluargaFormRequest extends FormRequest
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
            'keluarga_nama.*' => 'required',
            'keluarga_jenis.*' => 'required',
            'keluarga_gender.*' => 'required',
            'keluarga_tanggal_lahir.*' => 'required',
        ];
    }

    /**
     * Costum validation message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'keluarga_nama.*.required' => 'field tidak boleh kosong',
            'keluarga_jenis.*.required' => 'field tidak boleh kosong',
            'keluarga_gender.*.required' => 'field tidak boleh kosong',
            'keluarga_tanggal_lahir.*.required' => 'field tidak boleh kosong',
        ];
    }
}
