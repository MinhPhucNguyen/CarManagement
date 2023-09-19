<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changePassword(int $id, ChangePasswordRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::findOrFail($id);

        if (!$user) {
            return response()->json([
                'message' => 'Không tìm thấy người dùng.'
            ], 404);
        }

        $checkOldPassword = Hash::check($validatedData['oldPassword'], $user->password);

        if (!$checkOldPassword) {
            return response()->json([
                'message' => 'Mật khẩu cũ không đúng.'
            ], 400);
        }
        $user->password = Hash::make(trim($validatedData['newPassword']));
        $user->confirm_password = $validatedData['newPasswordConfirmation'] == $validatedData['newPassword'] ? 'true' : 'false';
        $user->update();

        return response()->json([
            'message' => 'Đổi mật khẩu thành công.'
        ], 200);
    }
}