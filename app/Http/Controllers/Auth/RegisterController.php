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
        $validatedData = $request->validated();
        
        $user = User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => Hash::make(trim($validatedData['password'])),
            'confirm_password' => $validatedData['confirm_password'] == $validatedData['password'] ? 'true' : 'false',
        ]);

        return redirect('/login')->with('success', 'Register successfully! Please login');
    }
}
