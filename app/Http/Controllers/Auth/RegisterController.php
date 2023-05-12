<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
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

    public function register(RegisterRequest $request)
    {
        
        $user = User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'confirm_password' => $request->input('confirm_password') == $request->input('password') ? 'true' : 'false',
        ]);

        return redirect('/login');
    }
}
