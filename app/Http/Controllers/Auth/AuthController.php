<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'errors' => 'Email hoặc mật khẩu không chính xác.'
            ], 401);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'errors' => 'Email hoặc mật khẩu không chính xác.'
            ], 401);
        }

        return response()->json([
            'message' => 'Đăng nhập thành công',
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->username)->accessToken,
        ], 200);
    }

    public function getUserInfo(Request $request)
    {
        return response()->json($request->user('api'));
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
            'phone' => '+84' . substr($validatedData['phone'], 1),
            'address' => $validatedData['address'],
            'password' => Hash::make(trim($validatedData['password'])),
            'confirm_password' => $validatedData['confirm_password'] == $validatedData['password'] ? 'true' : 'false',
        ]);

        return response()->json([
            'success' => 'Đăng ký thành công.',
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->username)->accessToken,
        ], 200);
    }

    public function logout(Request $request)
    {
        $token = $request->user('api')->token();
        $token->revoke();
        return response()->json([
            'message' => 'Đăng xuất thành công.'
        ], 200);
    }
}
