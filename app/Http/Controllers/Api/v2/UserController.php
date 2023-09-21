<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Http\Resources\v2\UserCollection;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $selected_role = request('selected_role', 'all');

        $search = request('search', '');

        $sort_direction = request('sort_direction', 'desc');
        if (!in_array($sort_direction, ['asc', 'desc'])) {
            $sort_direction = 'desc';
        }

        $sort_field = request('sort_field', 'created_at');
        if (!in_array($sort_field, ['id', 'fullname', 'username', 'email', 'phone', 'address'])) {
            $sort_field = 'created_at';
        }
        $getAllUsers = User::search(trim($search))
            ->when($selected_role !== 'all', function ($query) use ($selected_role) {
                $query->where('role_as', $selected_role);
            })
            ->when($sort_field, function ($query) use ($sort_direction, $sort_field) {
                if ($sort_field == 'fullname') {
                    $query->orderBy('firstname', $sort_direction)
                        ->orderBy('lastname', $sort_direction);
                } else {
                    $query->orderBy($sort_field, $sort_direction);
                }
            })
            ->paginate(10);

        return new UserCollection($getAllUsers);
    }

    public function getUserById(int $id)
    {
        $user = User::findOrFail($id);
        return response()->json(
            [
                'user' => $user
            ],
            200
        );
    }

    public function createUser(UserFormRequest $request)
    {
        $validatedInputs = $request->validated();

        $user = new User();
        $user->firstname = $validatedInputs['firstname'];
        $user->lastname = $validatedInputs['lastname'];
        $user->username = $validatedInputs['username'];
        $user->gender = $request->gender;
        $user->email = $validatedInputs['email'];
        $user->phone = $validatedInputs['phone'];
        $user->address = $validatedInputs['address'];
        $user->password = Hash::make(trim($validatedInputs['password']));
        $user->confirm_password = $validatedInputs['password'] == $validatedInputs['confirm_password'] ? 'true' : 'false';
        $user->role_as = $validatedInputs['role_as'];

        $user->save();

        return response()->json(
            [
                'message' => 'Create user successfully!',
                'user' => $user
            ],
            200
        );
    }

    public function editUser(int $id, UserFormRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::findOrFail($id);
        if ($user) {
            $user->firstname = $validatedData['firstname'];
            $user->lastname = $validatedData['lastname'];
            $user->gender = $request->gender;
            $user->username = $validatedData['username'];
            $user->email = $validatedData['email'];
            $user->phone = $validatedData['phone'];
            $user->address = $validatedData['address'];
            $user->role_as = $validatedData['role_as'];

            if ($request->birth) {
                $user->birth = date('Y-m-d', strtotime($request->birth));
            }

            if (empty($validatedData['password']) && empty($validatedData['confirm_password'])) {
                unset($validatedData['password']);
                unset($validatedData['confirm_password']);
            } else {
                $user->password = Hash::make($validatedData['password']);
                $user->confirm_password = $validatedData['confirm_password'] == $validatedData['password'] ? 'true' : 'false';
            }
            $user->update();
            return response()->json([
                'message' => "Update user successfully"
            ], 200);
        } else {
            return response()->json([
                'message' => "User not found"
            ], 404);
        }
    }

    public function updateInfor(int $id, UserFormRequest $request)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            return response()->json([
                'message' => "User not found"
            ], 404);
        }

        if ($request->fullname) {
            $fullname = explode(' ', trim($request->fullname));
            if ($fullname >= 2) {
                $lastname = $fullname[0];
                $firstname = implode(' ', array_slice($fullname, 1));
            } else {
                $lastname = $fullname[0];
                $firstname = '';
            }
            $user->lastname = $lastname;
            $user->firstname = $firstname;
        }
        $user->gender = $request->gender;
        $user->birth = date('Y-m-d', strtotime($request->birth));

        $user->update();
        return response()->json([
            'message' => "Cập nhật thông tin thành công"
        ], 200);
    }

    public function updatePhoneNumber(int $id, UserFormRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::findOrFail($id);
        if (!$user) {
            return response()->json([
                'message' => "User not found"
            ], 404);
        }

        $user->phone = $validatedData['phone'];
        $user->update();
        return response()->json([
            'message' => "Cập nhật số điện thoại thành công."
        ], 200);
    }

    public function updateEmail(int $id, UserFormRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::findOrFail($id);
        if (!$user) {
            return response()->json([
                'message' => "User not found"
            ], 404);
        }

        $user->email = $validatedData['email'];
        $user->email_verified_at = null;
        $user->update();
        return response()->json([
            'message' => "Cập nhật email thành công."
        ], 200);
    }

    public function sendVerificationEmail(int $id)
    {
        $user = User::findOrFail($id);
        if (!$user) {
            return response()->json([
                'message' => "User not found"
            ], 404);
        }

        $user->sendEmailVerificationNotification();

        return response()->json([
            'message' => "Gửi email xác thực thành công."
        ], 200);
    }

    public function deleteUser(int $id)
    {
        $user = User::findOrFail($id);
        if ($user->avatar) {
            $imageUrl = parse_url($user->avatar, PHP_URL_PATH);
            $imagePath = ltrim($imageUrl, '/storage/avatar');
            if ($imagePath !== 'default.jpg' && Storage::exists('avatar/' . $imagePath)) {
                Storage::delete('avatar/' .  $imagePath);
            }
        }
        $user->delete();
        return response()->json(
            [
                'message' => 'Delete user successfully.'
            ],
            200
        );
    }

    public function selectAllUser()
    {
        //Get all id of users
        return User::pluck('id');
    }

    public function deleteMultiUser($users)
    {
        $usersIdArray = explode(',', $users);
        $users = User::whereIn('id', $usersIdArray)->get();
        foreach ($users as $user) {
            if ($user->avatar) {
                $imageUrl = parse_url($user->avatar, PHP_URL_PATH);
                $imagePath = ltrim($imageUrl, '/storage/avatar');
                if ($imagePath !== 'default.jpg' && Storage::exists('avatar/' . $imagePath)) {
                    Storage::delete('avatar/' .  $imagePath);
                }
            }
            $user->delete();
        }
        return response()->json([
            'message' => 'Delete ' . count($usersIdArray) . ' user successfully'
        ], 200);
    }
}
