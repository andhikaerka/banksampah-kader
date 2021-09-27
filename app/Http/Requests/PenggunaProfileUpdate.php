<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PenggunaProfileUpdate extends FormRequest
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
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->user()->id)],
            'telepon' => ['required', Rule::unique('users')->ignore(auth()->user()->id)],
            'alamat' => ['required'],
            'kode_pos' => ['required', 'string'],
            'tanggal_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'provinsi' => ['required'],
            'kabupaten_kota' => ['required'],
            'kecamatan' => ['required'],
            'desa_kelurahan' => ['required'],
            'pengguna_kategori' => ['required'],
            'bank_sampah' => ['required'],
        ];
    }
}
