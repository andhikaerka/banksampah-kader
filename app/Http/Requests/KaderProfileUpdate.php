<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KaderProfileUpdate extends FormRequest
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
            'nama' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'telepon' => ['required', 'string'],
            'alamat' => ['required'],
            'kode_pos' => ['required', 'string'],
            'tanggal_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'provinsi' => ['required'],
            'kabupaten_kota' => ['required'],
            'kecamatan' => ['required'],
            'desa_kelurahan' => ['required'],
        ];
    }
}
