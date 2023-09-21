<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function verify(Request $request)
    {
        $user = User::findOrFail($request->id);

        // dd(sha1($user->getEmailForVerification()));

        //getEmailForVerification() là một phương thức của trait MustVerifyEmail để lấy email của user 
        //sh1() là một hàm băm để mã hóa email của user thành một chuỗi băm 
        //block if này có tác dụng kiểm tra xem chuỗi băm của email có trùng với chuỗi băm của request->hash hay không
        if (!hash_equals((string) $request->hash, sha1($user->getEmailForVerification()))) {
            return response()->json([
                'message' => 'Không được phép'
            ]);
        }

        //hasVerifiedEmail() là một phương thức của trait MustVerifyEmail để kiểm tra xem user đã xác thực email hay chưa
        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'Email đã được xác thực.'
            ], 200);
        }

        //markEmailAsVerified() là một phương thức của trait MustVerifyEmail để đánh dấu email của user đã được xác thực
        //new Verified($user) là một event để thông báo rằng user đã xác thực email thành công nằm trong Illuminate\Auth\Events\Verified
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return response()->json([
            'message' => 'Xác thực email thành công.'
        ], 200);
    }

    public function resendVerificationEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Không tìm thấy email.'
            ], 404);
        }

        $user->sendEmailVerificationNotification();

        return response()->json([
            'message' => 'Vui lòng kiểm tra email của bạn.'
        ]);
    }
}