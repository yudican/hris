<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DaruratFormRequest extends FormRequest
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
            'bd_jenis.*' => 'required',
            'bd_nama.*' => 'required',
            'bd_pekerjaan.*' => 'required',
            'bd_domisili.*' => 'required',
            'bd_telepon.*' => 'required|numeric',
        ];
    }


    /**
     * Cosum validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'bd_jenis.required' => 'field tidak boleh kosong',
            'bd_nama.required' => 'field tidak boleh kosong',
            'bd_pekerjaan.required' => 'field tidak boleh kosong',
            'bd_domisili.required' => 'field tidak boleh kosong',
            'bd_telepon.required' => 'field tidak boleh kosong',
            'bd_telepon.numeric' => 'field harus berupa angka',
        ];
    }
}
