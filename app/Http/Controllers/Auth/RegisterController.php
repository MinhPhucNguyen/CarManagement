<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $rules = [
            'username' => [
                'required',
                'string',
                'min:5',
                'max:30',
                'regex:/^[a-zA-Z0-9\s]+$/'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:50',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.{10,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?\W).*$/'
            ],
            'confirm_password' => [
                'required',
                'string',
                'same:password'
            ]

        ];

        $messages = [
            'username.required' => '*Please enter your username',
            'username.string' => '*Username must be a string and not contain special characters',
            'username.min' => '*Username must be at least 5 and at most 30 characters',
            'username.max' => '*Username must be at least 5 and at most 30 characters',
            'username.regex' => '*Username must start with a letter and not contain special characters',
            'email.required' => '*Please enter your email',
            'email.email' => '*Please enter a valid email',
            'email.max' => '*Email must be at most 50 characters',
            'email.unique' => '*Email already exists',
            'password.required' => '*Please enter your password',
            'password.min' => '*Password must be at least 8 characters',
            'password.regex' => '*Password must contain at least one uppercase letter, one lowercase letter, one number and one special character',
            'confirm_password.required' => '*Please confirm your password',
            'confirm_password.same:password' => '*Password confirmation does not match',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect('/register')->withErrors($validator)->withInput();
        }

        $user = User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'confirm_password' => $request->input('confirm_password') == $request->input('password') ? 'true' : 'false',
        ]);

        return redirect('/login');
    }
}
