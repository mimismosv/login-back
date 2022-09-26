<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
/**
 * > The rules function returns an array of rules that will be used to validate the data
 *
 * @return An array of rules.
 */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];
    }
}
