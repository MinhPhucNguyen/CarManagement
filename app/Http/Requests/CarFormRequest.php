<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'car_name' => 'required',
            'price' => 'required',
            'description' => 'nullable',
            'seats' => 'required',
            'fuel' => 'required',
            'year' => 'required',
            'speed' => 'required',
            'fuel_consumption' => 'required',
            'transmission' => 'required',
            'location' => 'required',
            'trip' => 'required',
            'brand' => 'required',
            'image' => 'nullable',
        ];
    }
}
