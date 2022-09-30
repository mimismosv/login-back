<?php

namespace App\Http\Requests\City;
use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'latitude' => 'required',
            'longitude' => 'required',
            'state_name' => 'required|string|max:255',
            'state_code' => 'required|string|max:255',
            'country_code' => 'required|string|max:2',
            'timezone' => 'required|string|max:255',
        ];
    }
}
