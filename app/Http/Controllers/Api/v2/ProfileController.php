<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function updateAvatar(int $user_id, Request $request)
    {
        $user = User::findOrFail($user_id);
        if ($user && $request->hasFile('profile_avatar')) {
            if ($user->avatar) {
                $imageUrl = parse_url($user->avatar, PHP_URL_PATH);
                $imagePath = ltrim($imageUrl, '/storage/avatar');
                if ($imagePath !== 'default.jpg' && Storage::exists('avatar/' . $imagePath)) {
                    Storage::delete('avatar/' .  $imagePath);
                }
            }
            $extension = $request->file('profile_avatar')->getClientOriginalExtension();
            $filename = time() . '_avatar_' . $user->id . '.' . $extension;
            $request->file('profile_avatar')->storeAs('avatar', $filename); //lưu vào localStorage
            $user->avatar = $filename;
            $user->save();
            return response()->json([
                'message' => 'Avatar changed successfully',
                'avatarUrl' =>  $user->avatar
            ], 200);
        } else {
            $user->avatar = 'default.jpg';
            $user->save();
            return response()->json([
                'message' => 'Something went wrong'
            ], 404);
        }
    }

    public function removeAvatar(int $id)
    {
        $user = User::findOrFail($id);
        if ($user->avatar) {
            $imageUrl = parse_url($user->avatar, PHP_URL_PATH);
            $imagePath = ltrim($imageUrl, '/storage/avatar');
            if ($imagePath !== 'default.jpg' && Storage::exists('avatar/' . $imagePath)) {
                Storage::delete('avatar/' .  $imagePath);
            }
        }
        $user->avatar = 'default.jpg';
        $user->save();

        return response()->json([
            'message' => 'Avatar Removed',
            'avatarUrl' =>  $user->avatar
        ], 200);
    }
}
