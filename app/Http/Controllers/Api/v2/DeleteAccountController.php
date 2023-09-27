<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteAccountController extends Controller
{
    public function deleteAccount(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(
            [
                'message' => 'Yêu cầu xóa tài khoản thành công.'
            ],
            200
        );
    }
}
