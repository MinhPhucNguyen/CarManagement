<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:8|regex:/^(?=.{10,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?\W).*$/|unique:users,password',
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '*Vui lòng nhập email.',
            'email.email' => '*Email không đúng định dạng.',

            'password.required' => '*Vui lòng nhập mật khẩu.',
            'password.min' => '*Mật khẩu phải có ít nhất 8 ký tự.',
            'password.regex' => '*Mật khẩu phải có ít nhất 1 ký tự hoa, 1 ký tự thường, 1 số và 1 ký tự đặc biệt.',
            'password.unique' => '*Mật khẩu không được trùng với mật khẩu cũ.',

            'password_confirmation.required' => '*Vui lòng nhập lại mật khẩu.',
            'password_confirmation.same' => '*Mật khẩu nhập lại không khớp.'

        ];
    }
}
