<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignUpRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showRegisterForm()
    {
        return view('auth.signup');
    }

    public function register(SignUpRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'username' => $validatedData['username'],
            'gender' => $validatedData['gender'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'password' => Hash::make(trim($validatedData['password'])),
            'confirm_password' => $validatedData['confirm_password'] == $validatedData['password'] ? 'true' : 'false',
        ]);

        return redirect('/login')->with('success', 'Register successfully! Please login');
    }
}
