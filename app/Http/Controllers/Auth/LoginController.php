<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function username()
    {
        return 'username';
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $rules = [
            'username' => [
                'required',
                'string',
                'min:5',
                'max:30',
                'regex:/^[a-zA-Z0-9\s]+$/'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.{10,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?\W).*$/'
            ],
        ];

        $messages = [
            'username.required' => '*Please enter your username',
            'username.string' => '*Username must be a string and not contain special characters',
            'username.min' => '*Username must be at least 5 and at most 30 characters',
            'username.max' => '*Username must be at least 5 and at most 30 characters',
            'username.regex' => '*Username must start with a letter and not contain special characters',
            'password.required' => '*Please enter your password',
            'password.min' => '*Password must be at least 8 characters',
            'password.regex' => '*Password must contain at least one uppercase letter, one lowercase letter, one number and one special character',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/login')->withErrors($validator)->withInput();
        }

        if (Auth::attempt($request->only('username', 'password'))) {
            if(Auth::user()->role_as == '1'){
                return redirect('/admin/dashboard');
            }
            return redirect('/home');
        }
        else {
            return redirect('/login')->withErrors(['username' => 'Username or password is incorrect'])->withInput();
        }
    }
}
