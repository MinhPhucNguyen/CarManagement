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
            'car_name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'seats' => 'required|numeric',
            'fuel' => 'required',
            'year' => 'required|numeric',
            'speed' => 'required|numeric',
            'fuel_consumption' => 'required',
            'transmission' => 'required',
            'location' => 'required',
            'number_of_trip' => 'required|numeric',
            'brand_id' => 'required',
            'image' => 'nullable',
            'rental_periods.*.id' => 'required',
            'rental_periods.*.from' => 'required',
            'rental_periods.*.to' => 'required',
        ];
    }
}
