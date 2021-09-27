<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KaderisasiUpdate extends FormRequest
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
            'email' => [
                'required', 
                'email', 
                Rule::unique('users')
                    ->ignore($this->kaderisasi)
            ],
            'telepon' => [
                'required', 
                Rule::unique('users')
                    ->ignore($this->kaderisasi)
            ],
            'alamat' => ['required'],
            'status_hubungan' => ['required'],
        ];
    }
}
