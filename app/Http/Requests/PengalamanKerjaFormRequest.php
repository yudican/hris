<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengalamanKerjaFormRequest extends FormRequest
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
            'bp_perusahan.*' => 'required',
            'bp_jabatan.*' => 'required',
            'bp_kota.*' => 'required',
            'bp_mulai.*' => 'required',
            'bp_akhir.*' => 'required',
            'bp_gaji_terakhir.*' => 'required',
            'bp_nama_atasan.*' => 'required',
            'bp_nomor_tlp_atasan.*' => 'required|numeric',
            'bp_jobdesc.*' => 'required',
            'bp_alasan_berhenti.*' => 'required'
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
            'bp_perusahan.*.required' => 'field tidak boleh kosong',
            'bp_jabatan.*.required' => 'field tidak boleh kosong',
            'bp_kota.*.required' => 'field tidak boleh kosong',
            'bp_mulai.*.required' => 'field tidak boleh kosong',
            'bp_akhir.*.required' => 'field tidak boleh kosong',
            'bp_gaji_terakhir.*.required' => 'field tidak boleh kosong',
            'bp_nama_atasan.*.required' => 'field tidak boleh kosong',
            'bp_nomor_tlp_atasan.*.required' => 'field tidak boleh kosong',
            'bp_nomor_tlp_atasan.*.numeric' => 'field harus berupa angka',
            'bp_jobdesc.*.required' => 'field tidak boleh kosong',
            'bp_alasan_berhenti.*.required' => 'field tidak boleh kosong'
        ];
    }
}
