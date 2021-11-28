<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankSampahStore extends FormRequest
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
            'provinsi' => ['required'],
            'kabupaten_kota' => ['required'],
        ];
    }
}
