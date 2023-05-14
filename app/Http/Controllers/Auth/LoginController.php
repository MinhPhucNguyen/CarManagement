<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
=======
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
>>>>>>> 00f7521d751d71004bc09b188ebd2429f6cd563a
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            if (Auth::user()->role_as == '1') {
                return redirect('/admin/dashboard')->with('success', 'Welcome to Dashboard Page');
            }
            return redirect('/home')->with('success', 'Welcome to Home Page');
        } else {
            return redirect('/login')->withErrors(['login_error' => 'Username or password is incorrect!']);
        }
    }
}
