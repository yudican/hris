<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SusunanAnakFormRequest extends FormRequest
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
        $validation['bsa_nama.*'] = 'required';
        $validation['bsa_jenis_anak.*'] = 'required';
        $validation['bsa_tanggal_lahir.*'] = 'required';
        $validation['bsa_pekerjaan.*'] = 'required';
        $validation['bsa_pendidikan.*'] = 'required';
        $validation['bsa_alamat.*'] = 'required';
        $validation['bsa_nomor_hp.*'] = 'required|numeric';
        $validation['bsa_perkawinan.*'] = 'required';
        if ($this->request->get('bsa_perkawinan')) {
            foreach ($this->request->get('bsa_perkawinan') as $key => $value) {
                if ($this->request->get('bsa_perkawinan')[$key] == 'Kawin') {
                    $validation['bsap_jenis.'.$key] = 'required';
                    $validation['bsap_nama.'.$key] = 'required';
                    $validation['bsap_pekerjaan.'.$key] = 'required';
                    $validation['bsap_nomor_hp.'.$key] = 'required|numeric';
                }
            }
        }
        return $validation;
    }

    /**
     * Costum validation message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'bsa_nama.*.required' => 'field tidak boleh kosong',
            'bsa_jenis_anak.*.required' => 'field tidak boleh kosong',
            'bsa_tanggal_lahir.*.required' => 'field tidak boleh kosong',
            'bsa_pekerjaan.*.required' => 'field tidak boleh kosong',
            'bsa_pendidikan.*.required' => 'field tidak boleh kosong',
            'bsa_alamat.*.required' => 'field tidak boleh kosong',
            'bsa_nomor_hp.*.required' => 'field tidak boleh kosong',
            'bsa_nomor_hp.*.numeric' => 'field harus berupa angka',
            'bsa_perkawinan.*.required' => 'field tidak boleh kosong',
            'bsap_jenis.*.required' => 'field tidak boleh kosong',
            'bsap_nama.*.required' => 'field tidak boleh kosong',
            'bsap_pekerjaan.*.required' => 'field tidak boleh kosong',
            'bsap_nomor_hp.*.required' => 'field tidak boleh kosong',
            'bsap_nomor_hp.*.numeric' => 'field harus berupa angka',
        ];
    }
}
