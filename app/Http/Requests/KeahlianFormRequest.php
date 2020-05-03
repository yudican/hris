<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KeahlianFormRequest extends FormRequest
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
           'keahlian_nama.*' => 'required',
           'keahlian_nilai.*' => 'required|numeric',
        ];
    }

    /**
     * Costum validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
           'keahlian_nama.*.required' => 'field tidak boleh kosong',
           'keahlian_nilai.*.required' => 'field tidak boleh kosong',
           'keahlian_nilai.*.numeric' => 'field harus berupa angka',
        ];
    }
}
