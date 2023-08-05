<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignUpRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponses;

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
        try {
            $request->validated($request->all());
            $credentials = $request->only('username', 'password');

            if (!Auth::attempt($credentials)) {
                return $this->error('', 'Tên đăng nhập hoặc mật khẩu không chính xác!', 401);
            }

            $user = User::where('username', $request->username)->first();

            if (!Hash::check($request->password, $user->password)) {
                return $this->error('', 'Tên đăng nhập hoặc mật khẩu không chính xác!', 401);
            }
            if ($user->role_as == '1') {
                return $this->success([
                    'user' => $user,
                    'token' => $user->createToken('API Token of ' . $user->username)->plainTextToken,
                ], 'Đăng nhập thành công');
            }
            else if($user->role_as == '0'){
                return $this->success([
                    'user' => $user,
                    'token' => $user->createToken('API Token of' . $user->username)->plainTextToken,
                ], 'Đănh nhâp thành công');
            }

        } catch (Exception $error) {
            return $this->error('', 'Có lỗi xảy ra', 500);
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
