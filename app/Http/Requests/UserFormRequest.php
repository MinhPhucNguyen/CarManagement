<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserFormRequest extends FormRequest
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
        $id = $this->route('id');
        $isUpdate = $this->getMethod() == 'PUT' || $this->getMethod() == 'PATCH';

        $rules = [
            'firstname' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'regex:/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'
            ],
            'lastname' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'regex:/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'
            ],
            'username' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'min:5',
                'max:20',
                'regex:/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'
            ],

            'address' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:150',
                // 'regex:/^(\\d{1,}) [a-zA-Z0-9\\s]+(\\,)? [a-zA-Z]|[a-zA-Z]+$/',
                'regex:/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'
            ],
            'role_as' => [
                $isUpdate ? 'sometimes' : 'required',
            ]
        ];

        if ($isUpdate) {
            $rules['email'] =  [
                $isUpdate ? 'sometimes' : 'required',
                'email',
                Rule::unique('users', 'email')->ignore($id)
            ];
            $rules['phone'] = [
                $isUpdate ? 'sometimes' : 'required',
                // 'nullable',
                'min:10',
                'max:10',
                Rule::unique('users', 'phone')->ignore($id)
            ];
            $rules['password'] = 'sometimes|nullable|string|min:8|regex:/^(?=.{10,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?\W).*$/|unique:users';
            $rules['confirm_password'] = 'sometimes|nullable|string|same:password';
        } else {
            $rules['email'] =  [
                'required',
                'string',
                'email',
                'unique:users,email'
            ];
            $rules['phone'] = [
                'required',
                'min:10',
                'max:10',
                'unique:users,phone'
            ];
            $rules['password'] = 'required|string|min:8|regex:/^(?=.{10,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?\W).*$/|unique:users';
            $rules['confirm_password'] = 'required|string|same:password';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'firstname.required' => '*Please enter firstname',
            'firstname.string' => '*Firstname must be a string',
            'firstname.regex' => '*Firstname must not contain special characters',

            'lastname.required' => '*Please enter lastname',
            'lastname.string' => '*Lastname must be a string',
            'lastname.regex' => '*Lastname must not contain special characters',

            'username.required' => '*Please enter username',
            'username.string' => '*Username must be a string',
            'username.min' => '*Username must be at least 5 and at most 30 characters',
            'username.max' => '*Username must be at least 5 and at most 30 characters',
            'username.regex' => '*Username must start with a letter, not start with a number and special characters and not contain special characters',

            'email.required' => '*Please enter email',
            'email.email' => '*Please enter a valid email',
            'email.unique' => '*Email already exists',

            'phone.required' => '*Please enter phone number',
            'phone.min' => '*Phone number must be 10 numbers',
            'phone.max' => '*Phone number must be 10 numbers',
            'phone.unique' => '*Phone number already exists',

            'address.required' => '*Please enter address',
            'address.regex' => '*Please enter a valid address',
            'address.max' => '*Address must be at most 150 characters',

            'role_as.required' => "*Please select a role",

            'password.required' => '*Please enter password',
            'password.min' => '*Password must be at least 8 characters',
            'password.unique' => '*Password already exists',
            'password.regex' => '*Password must contain at least one uppercase letter, one lowercase letter, one number and one special character',

            'confirm_password.required' => '*Please confirm password',
            'confirm_password.same:password' => '*Password confirmation does not match',
        ];
    }
}
