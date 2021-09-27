<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class GantiPasswordStore extends FormRequest
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
            'password_lama' => ['required', 'required_with:password_baru'],
            'password_baru' => ['required', Password::min(8), 'min:8'],
            'konfirmasi_password_baru' => ['required', Password::min(8), 'same:password_baru'],
        ];
    }
}
