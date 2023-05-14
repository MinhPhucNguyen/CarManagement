<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $role = $request->input('role_as');

        if ($role == '1') {
            $usersList = User::where('role_as', $role)->orderBy('id', 'desc')->simplePaginate(15);
        } else if ($role == '0') {
            $usersList = User::where('role_as', $role)->orderBy('id', 'desc')->simplePaginate(15);
        }
        else{
            $usersList = User::orderBy('id', 'desc')->simplePaginate(15);
        }
        return view('admin.users.index', compact('usersList'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserFormRequest $request)
    {
        $validatedInputs = $request->validated();
        // dd($request);
        // dd($validatedInputs);

        $user = new User();
        $user->username = $validatedInputs['username'];
        $user->email = $validatedInputs['email'];
        $user->phone = $validatedInputs['phone'];
        $user->password = Hash::make($validatedInputs['password']);
        $user->confirm_password = $validatedInputs['password'] == $validatedInputs['confirm_password'] ? 'true' : 'false';
        $user->role_as = $validatedInputs['role_as'] == 'admin' ? '1' : '0';

        $user->save();

        return redirect('admin/users')->with('success', 'Create user successfully');
    }

    public function edit(User $user)
    {
        // dd($user);
        return view('admin.users.edit', compact('user'));
    }

    public function update(int $user_id, UserFormRequest $request)
    {
        $validatedData = $request->validated();
        // dd($user_id);
        // dd($request);

        $user = User::findOrFail($user_id);

        if ($user) {
            $user->username = $validatedData['username'];
            $user->email = $validatedData['email'];
            $user->phone = $validatedData['phone'];

            if (empty($validatedData['password']) && empty($validatedData['confirm_password'])) {
                unset($validatedData['password']);
                unset($validatedData['confirm_password']);
            } else {
                $user->password = Hash::make($validatedData['password']);
                $user->confirm_password = $validatedData['confirm_password'] == $validatedData['password'] ? 'true' : 'false';
            }

            $user->role_as = $validatedData['role_as'] == 'admin' ? '1' : '0';

            $user->update();
            return redirect('admin/users')->with('success', "User updated successfully");
        } else {
            return  redirect('admin/users')->with('message', 'User not found');
        }
    }

    public function destroy(int $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();
        return redirect()->back()->with('success', 'Delete user successfully');
    }
}
