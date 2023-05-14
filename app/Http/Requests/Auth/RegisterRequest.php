<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
                'max:30',
                'regex:/^[^0-9][a-zA-Z0-9\s]+$/'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:50',
                'unique:users,email',
            ],
            'phone' => [
                'required',
                'min:10',
                'max:10',
                'unique:users,phone',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.{10,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?\W).*$/',
                'unique:users,password',
            ],
            'confirm_password' => [
                'required',
                'string',
                'same:password'
            ]
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '*Please enter your username',
            'username.string' => '*Username must be a string',
            'username.min' => '*Username must be at least 5 and at most 30 characters',
            'username.max' => '*Username must be at least 5 and at most 30 characters',
            'username.regex' => '*Username must start with a letter, not start with a number and not contain special characters',
            'email.required' => '*Please enter your email',
            'email.email' => '*Please enter a valid email',
            'email.max' => '*Email must be at most 50 characters',
            'email.unique' => '*Email already exists',
            'phone.required' => '*Please enter your phone number',
            'phone.min' => '*Phone number must be at least 10 characters',
            'phone.max' => '*Phone number must be at most 10 characters',
            'phone.unique' => '*Phone number already exists',
            'password.required' => '*Please enter your password',
            'password.min' => '*Password must be at least 8 characters',
            'password.unique' => '*Password already exists',
            'password.regex' => '*Password must contain at least one uppercase letter, one lowercase letter, one number and one special character',
            'confirm_password.required' => '*Please confirm your password',
            'confirm_password.same:password' => '*Password confirmation does not match',
        ];
    }
}
