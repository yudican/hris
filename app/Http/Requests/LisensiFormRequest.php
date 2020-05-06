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
        $validation['bil_kategori.*'] = 'required';
        $validation['bil_jenis.*'] = 'required';
        $validation['bil_nomor.*'] = 'required|numeric';
        if ($this->request->get('bil_tanggal_expired')) {
            $jenis = ['SIM A', 'SIM B I', 'SIM B II', 'SIM C', 'SIM D'];
            foreach ($this->request->get('bil_tanggal_expired') as $key => $value) {
                if (in_array($this->request->get('bil_jenis')[$key], $jenis)) {
                    $validation['bil_tanggal_expired.' . $key] = 'required';
                }
            }
        }
        return $validation;
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
            'bil_tanggal_expired.*.required' => 'field tidak boleh kosong',
            'bil_nomor.*.numeric' => 'field harus berupa angka',
        ];
    }
}
