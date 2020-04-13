<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerusahaanFormRequest extends FormRequest
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
            'perusahaan_logo' => 'image|max:2048',
            'perusahaan_favicon' => 'image|max:2048',
            'perusahaan_kodepos' => 'numeric|digits:5',
            'perusahaan_email' => 'email:rfc,dns',
            'perusahaan_fax' => 'numeric',
            'perusahaan_telepon' => 'numeric',
            'perusahaan_website' => 'url'
        ];
    }

    /**
     * Costumize form validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'perusahaan_logo.image' => 'Format file Logo Perusahaan tidak didukung',
            'perusahaan_logo.max' => 'Ukuran maksimum file adalah 2048',
            'perusahaan_favicon.image' => 'Format file Favicon tidak didukung',
            'perusahaan_favicon.max ' => 'Ukuran maksimum file adalah 2048',
            'perusahaan_kodepos.numeric' => 'Kodepos harus berupa angka',
            'perusahaan_kodepos.digits' => 'Kodepos harus berisi 5 karakter',
            'perusahaan_email.email' => 'Mohon masukkan valid email',
            'perusahaan_fax.numeric' => 'Nomor Fax harus berupa angka',
            'perusahaan_telepon.numeric' => 'Nomor Telepon harus berupa angka',
            'perusahaan_website.url' => 'Silahkan masukkan valid url website'
        ];
    }
}
