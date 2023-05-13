<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            if (Auth::user()->role_as == '1') {
                return redirect('/admin/dashboard')->with('success', 'Welcome to Dashboard Page');
            }
            return redirect('/home')->with('success', 'Welcome to Home Page');
        } else {
            return redirect('/login')->withErrors(['login_error' => 'Username or password is incorrect!'])->withInput();
        }
    }
}
