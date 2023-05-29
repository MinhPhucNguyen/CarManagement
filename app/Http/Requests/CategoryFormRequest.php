<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
            'name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],

            'phone' => ['required', 'string', 'min:10', 'max:15', 'regex:/^(08|09|03)\d{8}$/'],

            'address' => ['required', 'max:255', 'regex:/^[\p{L}\d\s,]+$/u'],

            'image' => ['nullable', 'mimes:jpg,jpeg,png'],


            'lincense_plates' => ['required', 'string', 'max:20', 'regex:/^\d{2}[A-Z]-\d{4,5}$/u'],

            'note' => ['required', 'string'],
        ];
    }
}
