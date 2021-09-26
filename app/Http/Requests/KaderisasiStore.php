<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KaderisasiStore extends FormRequest
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
            'email' => ['required', 'email', 'unique:users,email'],
            'telepon' => ['required'],
            'alamat' => ['required'],
            'status_hubungan' => ['required'],
        ];
    }
}
