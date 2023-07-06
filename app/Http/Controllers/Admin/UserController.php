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
        $usersList = User::orderBy('id', 'DESC')
            ->when($request->filterBy != NULL, function ($q) use ($request) {
                if ($request->filterBy == "all") {
                    return $q->orderBy('id', 'DESC');
                } else {
                    return $q->where('role_as', $request->filterBy);
                }
            })
            ->simplePaginate(10);

        $usersList->appends(['filterBy' => $request->filterBy]); //Thêm một mảng các tham số truy vấn vào URL của liên kết phân trang

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

        return redirect('admin/users')->with('message', 'Create user successfully');
    }

    public function edit(User $user)
    {
        // dd($user);
        return view('admin.users.edit', compact('user'));
    }

    public function update(int $user_id, UserFormRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::findOrFail($user_id);
        // dd(!$user);

        if ($user) {
            $user->username = $validatedData['username'];
            $user->email = $validatedData['email'];
            $user->phone = $validatedData['phone'];
            $user->address = $validatedData['address'];
            $user->role_as = $validatedData['role_as'] == 'admin' ? '1' : '0';

            if (empty($validatedData['password']) && empty($validatedData['confirm_password'])) {
                unset($validatedData['password']);
                unset($validatedData['confirm_password']);
            } else {
                $user->password = Hash::make($validatedData['password']);
                $user->confirm_password = $validatedData['confirm_password'] == $validatedData['password'] ? 'true' : 'false';
            }

            $user->update();
            return redirect('admin/users')->with('message', "User updated successfully");
        } else {
            return  redirect('admin/users')->with('message', 'User not found');
        }
    }
    public function destroy(int $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();
        return redirect()->back()->with('message', 'Delete user successfully');
    }


    public function search(Request $request)
    {
        $filterBy = $request->input('filterBy'); //lấy giá trị của tham số filterBy
        // dd($filterBy);
        $searchValue = $request->input('search');
        // dd($valueSearch);

        $usersList = User::query();

        $usersList = $usersList->simplePaginate(15); //Thêm các tham số vào quá trình phân trang, khi chuyển trang thì tham số vẫn giữ nguyên để lọc danh sách user theo role

        return view('admin.users.index', compact('usersList'));
    }
}
