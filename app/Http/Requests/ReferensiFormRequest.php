<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReferensiFormRequest extends FormRequest
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
            'br_nama.*' => 'required',
            'br_hubungan.*' => 'required',
            'br_jabatan.*' => 'required',
            'br_cabang.*' => 'required',
            'br_status.*' => 'required',
        ];
    }


    /**
     * costum validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'br_nama.required' => 'field tidak kosong',
            'br_hubungan.required' => 'field tidak kosong',
            'br_jabatan.required' => 'field tidak kosong',
            'br_cabang.required' => 'field tidak kosong',
            'br_status.required' => 'field tidak kosong',
        ];
    }
}
