<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SponsorUpdate extends FormRequest
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
            'judul' => [
                'required', 
                'string', 
                Rule::unique('sponsor', 'judul')->ignore($this->sponsor->id)
            ],
            'lokasi' => ['required'],
            'gambar' => ['mimes:jpg,jpeg,png', 'file', 'max:2048'],
            'url' => ['url', 'nullable'],
            'alt_text' => ['string', 'nullable'],
        ];
    }
}
