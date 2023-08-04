<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignUpRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login', 'register']]);
    // }

    // public function login(LoginRequest $request)
    // {
    //     if (!$token = Auth::attempt($request->only('username', 'password'))) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }

    //     $redirectUrl = Auth::user()->role_as == '1' ? '/admin/dashboard' : '/home';
    //     return $this->createNewToken($token)->withRedirect($redirectUrl);
    // }

    // protected function createNewToken($token)
    // {
    //     return response()->json([
    //         'access_token' => $token,
    //         'token_type' => 'bearer',
    //         'expires_in' => auth()->factory()->getTTL() * 60,
    //         'user' => Auth::user(),
    //     ]);
    // }

    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('guest')->except('logout');
        // Middleware ('guest') đảm bảo rằng yêu cầu đăng ký chỉ được xử lý nếu người dùng không đăng nhập,
        // nếu đã đăng nhập thì chuyển tối trang chủ
    }

    public function username()
    {
        return 'username';
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.signup');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            if (Auth::user()->role_as == '1') {
                return redirect('/admin/dashboard')->with('success', 'Welcome to Dashboard Page');
            } else if (Auth::user()->role_as == '0') {
                return redirect('/home')->with('success', 'Welcome to Home Page');
            }
        } else {
            return redirect('/login')->withErrors(['login_error' => 'Username or password is incorrect!'])->withInput();
        }
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

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
