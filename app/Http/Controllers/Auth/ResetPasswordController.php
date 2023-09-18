<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function resetPassword(int $id, UserFormRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::findOrFail($id);

        if (!$user) {
            return response()->json([
                'message' => 'Không tìm thấy người dùng'
            ], 404);
        }

        $checkOldPassword = Hash::check($validatedData['old_pw'], $user->password);

        if (!$checkOldPassword) {
            return response()->json([
                'message' => 'Mật khẩu cũ không đúng'
            ], 400);
        }

        dd($request->all());
        $user->password = Hash::make(trim($validatedData['new_pw']));
        $user->confirm_password = $validatedData['confirm_new_pw'] == $validatedData['new_pw'] ? 'true' : 'false';
        $user->update();

        return response()->json([
            'message' => 'Đổi mật khẩu thành công'
        ], 200);
    }
}
