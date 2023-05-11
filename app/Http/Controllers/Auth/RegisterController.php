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
                'max:50',
                'regex:/^[a-zA-Z0-9\]+$/'
            ],
            'email' => [
                'required',
                'string',
                'max:50',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed'
            ],
            'confirm_password' => [
                'required',
                'string',
                'min:8',
                'same:password'
            ]

        ];

        $validator = Validator::make($request->all(), $rules);

        $user = User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        Auth::login($user);

        return redirect('/login');
    }
}
