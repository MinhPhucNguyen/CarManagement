<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $filterBy = $request->input('filterBy'); //chèn biến role_as vào parameter của hàm simplePaginate để phân trang

        $usersList = User::query();

        if ($filterBy != 'all') {
            if ($filterBy == '0' || $filterBy == '1') {
                $usersList = User::where('role_as', $filterBy);
            } else if ($filterBy == 'asc') {
                $usersList = User::orderBy('id', $filterBy);
            }
        } else {
            $usersList = User::orderBy('id', 'desc');
        }

        $usersList = $usersList->simplePaginate(15)
            ->appends(['filterBy' => $filterBy]); //Thêm các tham số vào quá trình phân trang, khi chuyển trang thì tham số vẫn giữ nguyên để lọc danh sách user theo role
        return view('admin.users.index', compact('usersList'));
    }

    public function show(int $userID)
    {
        // dd($userID);
        $user = User::findOrFail($userID);
        return view('admin.users.view', compact('user'));
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
        $user->address = $validatedInputs['address'];
        $user->password = Hash::make(trim($validatedInputs['password']));
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

    public function search(Request $request)
    {
        $filterBy = $request->input('filterBy'); //chèn biến filterBy vào parameter của hàm simplePaginate để phân trang
        $valueSearch = $request->input('search');

        $usersList = User::query();

        if ($filterBy != 'all') {
            if ($filterBy == '1' || $filterBy == '0') {
                $usersList->where('role_as', $filterBy);
            } else if ($filterBy == 'asc') {
                $usersList->orderBy('id', $filterBy);
            }
        } else if ($filterBy == 'all') {
            $usersList->orderBy('id', 'desc');
        }

        if ($valueSearch) {
            $usersList->where('username', 'like', "$valueSearch%");
        }

        $usersList = $usersList->simplePaginate(15)
            ->appends(['filterBy' => $filterBy, 'valueSearch' => $valueSearch]); //Thêm các tham số vào quá trình phân trang, khi chuyển trang thì tham số vẫn giữ nguyên để lọc danh sách user theo role

        return view('admin.users.index', compact('usersList'));
    }
}
