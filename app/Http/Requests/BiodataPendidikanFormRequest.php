<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BiodataPendidikanFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pendidikan_nama.*' => 'required',
            'pendidikan_kota.*' => 'required',
            'pendidikan_jurusan.*' => 'required',
            'pendidikan_fakultas.*' => 'required',
            'pendidikan_jenjang.*' => 'required',
            'pendidikan_mulai.*' => 'required',
            'pendidikan_lulus.*' => 'required',
            'pendidikan_ipk.*' => 'required',
        ];
    }
}
