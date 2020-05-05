<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LisensiFormRequest extends FormRequest
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
            'bil_kategori.*' => 'required',
            'bil_jenis.*' => 'required',
            'bil_nomor.*' => 'required|numeric',
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
            'bil_kategori.*.required' => 'field tidak boleh kosong',
            'bil_jenis.*.required' => 'field tidak boleh kosong',
            'bil_nomor.*.required' => 'field tidak boleh kosong',
            'bil_nomor.*.numeric' => 'field harus berupa angka',
        ];
    }
}
