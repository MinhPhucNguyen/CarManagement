<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'firstname' => [
                'required',
                'string',
                'regex:/^[a-zA-Z\s]+$/'
            ],
            'lastname' => [
                'required',
                'string',
                'regex:/^[a-zA-Z\s]+$/'
            ],
            'username' => [
                'required',
                'unique:users,username',
                'string',
                'min:5',
                'max:20',
                'regex:/^[a-zA-Z][a-zA-Z0-9]*$/'
            ],
            'gender' => [
                'required',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'unique:users,email',
            ],
            'phone' => [
                'required',
                'min:10',
                'max:10',
                'unique:users,phone',
                'regex:/[0-9]/'
            ],
            'address' => [
                'required',
                'string',
                'max:150',
                'regex:/^(\\d{1,}) [a-zA-Z0-9\\s]+(\\,)? [a-zA-Z]|[a-zA-Z]+$/',
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
            'firstname.required' => '*Please enter your firstname',
            'firstname.string' => '*Firstname must be a string',
            'firstname.regex' => '*Firstname must not contain special characters',
            'lastname.required' => '*Please enter your lastname',
            'lastname.string' => '*Lastname must be a string',
            'lastname.regex' => '*Lastname must not contain special characters',
            'username.required' => '*Please enter your username',
            'username.string' => '*Username must be a string',
            'username.unique' => '*Username already exists. Please choose another username',
            'username.min' => '*Username must be at least 5 and at most 30 characters',
            'username.max' => '*Username must be at least 5 and at most 30 characters',
            'username.regex' => '*Username must start with a letter, not start with a number and special characters and not contain special characters',
            'gender.required' => '*Please select your gender',
            'email.required' => '*Please enter your email',
            'email.email' => '*Please enter a valid email',
            'email.unique' => '*Email already exists. Please enter another email',
            'phone.required' => '*Please enter your phone number',
            'phone.regex' => '*Please enter a valid phone number',
            'phone.min' => '*Phone number must be 10 characters',
            'phone.max' => '*Phone number must be at most 10 characters',
            'address.required' => '*Please enter your address',
            'address.regex' => '*Please enter a valid address',
            'address.max' => '*Address must be at most 50 characters',
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
