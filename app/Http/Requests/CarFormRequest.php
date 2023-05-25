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
        $id = $this->route('car');

        $rules = [
            'name' => [
                'required',
                'string',
                'min:1',
                'max:50',
                'regex:/^[a-zA-Z]*$/'
            ],
            'price' => [
                'required',
                'numeric',
                'min:0',
                'regex:/^-?[0-9][0-9,\.]+$/'
            ],
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => '*Please enter car name',
            'name.string' => '*Name must be a string',
            'name.min' => '*Name must be at least 1 and at most 50 characters',
            'name.max' => '*Name must be at least 1 and at most 50 characters',
            'name.regex' => '*Name must start with a letter, not start with a number and special characters and not contain special characters',
            'price.required' => '*Please enter car price',
            'price.numeric' => '*Price must be a double',
            'price.min' => '*Price must be greater than 0',
            'price.regex' => '*Please enter number type',
        ];
    }
}
