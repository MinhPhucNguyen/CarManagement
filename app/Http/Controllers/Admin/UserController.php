<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $usersList = User::orderBy('id', 'desc')->get();
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
        $validatedInputs = $request->validate([
            'password' => 'nullable',
            'confirmed_password' => 'nullable|same:password'
        ]);

        $user = User::findOrFail($user_id);

        if ($user) {
            $user->username = $validatedData['username'];
            $user->email = $validatedData['email'];
            $user->phone = $validatedData['phone'];
            
            if(empty($validatedInputs['password']) && empty($validatedInputs['confirm_password'])){
                unset($validatedInputs['password']);
                unset($validatedInputs['confirm_password']);
            }
            else{
                $user->password = Hash::make($validatedInputs['password']);
                $user->confirm_password = $validatedInputs['confirm_password'] == $validatedInputs['password'] ? 'true' : 'false';
            }

            $user->role_as = $validatedData['role_as'] == 'admin' ? '1' : '0';
            
            $user->update();
            return redirect('admin/users')->with('success', "User updated successfully");
        } else {
            return  redirect('admin/users')->with('message', 'User not found');
        }
    }
}
