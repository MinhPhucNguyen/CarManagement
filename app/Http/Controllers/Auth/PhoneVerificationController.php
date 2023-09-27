<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PhoneVerificationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class PhoneVerificationController extends Controller
{
    public function verify(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();

        if (!$user) {
            return response()->json([
                'message' => "Không tìm thấy số điện thoại."
            ], 404);
        }

        if ($user->phone_is_verified) {
            return response()->json([
                'message' => "Số điện thoại đã được xác thực.",
            ], 404);
        }

        $token = env('TWILIO_AUTH_TOKEN');
        $twilio_account_sid = env('TWILIO_ACCOUNT_SID');
        $twilio_verify_sid = env('TWILIO_VERIFY_SID');

        $twilio = new Client($twilio_account_sid, $token);

        $verification_check = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create([
                'to' => $request->phone,
                'code' => trim($request->otp)
            ]);

        if ($verification_check->valid && $verification_check->status === 'approved') {
            $user->phone_is_verified = 1;
            $user->update();
            return response()->json([
                'message' => "Số điện thoại xác thực thành công."
            ], 200);
        } else if ($verification_check->status === 'expired') {
            return response()->json([
                'message' => "Mã OTP đã hết hạn."
            ], 400);
        } else {
            return response()->json([
                'message' => "Mã không đúng."
            ], 400);
        }
    }
}
