<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteAccountController extends Controller
{
    public function deleteAccount(Request $request)
    {
        $user = $request->user();
        $user->delete();
        return response()->json(
            [
                'message' => 'Yêu cầu xóa tài khoản thành công.'
            ],
            200
        );
    }
}
