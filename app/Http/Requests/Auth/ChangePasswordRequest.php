<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8|regex:/^(?=.{10,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?\W).*$/|unique:users,password',
            'newPasswordConfirmation' => 'required|same:newPassword'
        ];
    }

    public function messages()
    {
        return [
            'oldPassword.required' => '*Vui lòng nhập mật khẩu hiện tại',

            'newPassword.required' => '*Vui lòng nhập mật khẩu mới',
            'newPassword.min' => '*Mật khẩu mới phải có ít nhất 8 ký tự',
            'newPassword.regex' => '*Mật khẩu mới phải có ít nhất 1 ký tự hoa, 1 ký tự thường, 1 số và 1 ký tự đặc biệt',

            'newPasswordConfirmation.required' => '*Vui lòng nhập lại mật khẩu mới',
            'newPasswordConfirmation.same' => '*Mật khẩu nhập lại không khớp'
        ];
    }
}