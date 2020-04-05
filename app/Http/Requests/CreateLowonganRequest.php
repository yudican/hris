<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLowonganRequest extends FormRequest
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
            'lowongan_bagian' => 'required',
            'lowongan_karyawan' => 'required',
            'lowongan_salary_max' => 'required|numeric',
            'lowongan_wilayah' => 'required',
            'lowongan_deskripsi' => 'required',
            'lowongan_kualifikasi' => 'required',
            'lowongan_status' => 'required',
            'lowongan_tanggal_open' => 'required',
            'lowongan_tanggal_close' => 'required'
        ];
    }
}
