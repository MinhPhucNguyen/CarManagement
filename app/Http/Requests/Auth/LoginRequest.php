<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => [
                'required',
                'string',
                'min:5',
                'max:20',
                'regex:/^[a-zA-Z][a-zA-Z0-9]*$/'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.{10,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?\W).*$/'
            ],
        ];
    }

    public function messages()
    {
            return [
                'username.required' => '*Please enter your username',
                'username.string' => '*Username must be a string and not contain special characters',
                'username.min' => '*Username must be at least 5 and at most 30 characters',
                'username.max' => '*Username must be at least 5 and at most 30 characters',
                'username.regex' => '*Username must start with a letter, not start with a number and special characters and not contain special characters',
                
                'password.required' => '*Please enter your password',
                'password.min' => '*Password must be at least 8 characters',
                'password.regex' => '*Password must contain at least one uppercase letter, one lowercase letter, one number and one special character',
            ];
    }
}
