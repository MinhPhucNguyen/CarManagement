<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(ForgotPasswordRequest $request)
    {
        //sendResetLink() đảm bảo truy xuất người dùng theo trường nhất định (ở đây là email)
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
        //RESET_LINK_SENT 
        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }

    // broker() là một phương thức của Password::class để trả về một đối tượng PasswordBroker
    // PasswordBroker là một đối tượng để thực hiện các thao tác liên quan đến mật khẩu
    public function broker()
    {
        return Password::broker();
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response()->json([
            'message' => 'Email đã được gửi, vui lòng kiểm tra email của bạn.',
            'response' => $response
        ], 200);
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json([
            'message' => 'Email không tồn tại, vui lòng nhập lại.',
            'response' => $response
        ], 500);
    }
}
