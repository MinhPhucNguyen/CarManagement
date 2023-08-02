<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    protected $uploadsAvatarPath = 'uploads/avatar/';
    protected $defaultImage = 'default.jpg';

    public function index(Request $request)
    {
        $sortDirection = $request->input('direction');
        $sortColumn = $request->input('sort');

        $usersList = User::when($request->filterBy != NULL, function ($q) use ($request,  $sortDirection,  $sortColumn) {
            if ($request->filterBy == "all") {
                return $q->orderBy($sortColumn ?? 'id', $sortDirection ?? 'desc');
            } else {
                return $q->where('role_as', $request->filterBy);
            }
        })
            ->orderBy($sortColumn ?? 'id', $sortDirection ?? 'desc')
            ->simplePaginate(10);

        $usersList->appends([
            'filterBy' => $request->filterBy,
            'sort' => $sortColumn,
            'direction' => $sortDirection,
        ]); //Thêm một mảng các tham số truy vấn vào URL của liên kết phân trang

        return view('admin.users.index', compact('usersList'));
    }

    public function show(int $id)
    {
        // dd($userID);
        $user = User::findOrFail($id);
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
        $user->firstname = $validatedInputs['firstname'];
        $user->lastname = $validatedInputs['lastname'];
        $user->username = $validatedInputs['username'];
        $user->gender = $validatedInputs['gender'];
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
            $user->firstname = $validatedData['firstname'];
            $user->lastname = $validatedData['lastname'];
            $user->gender = $validatedData['gender'];
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

    public function updateAvatar(int $user_id, Request $request)
    {
        $user = User::findOrFail($user_id);
        if ($user && $request->hasFile('avatar-input')) {
            if ($user->avatar && $user->avatar != $this->defaultImage) {
                File::delete($this->uploadsAvatarPath . $user->avatar); //Xóa ảnh avatar cũ trước đó
            }
            $extension = $request->file('avatar-input')->getClientOriginalExtension();
            $filename = time() . '_avatar_' . $user->id . '.' . $extension;
            Image::make($request->file('avatar-input'))->resize(120, 120)->save($this->uploadsAvatarPath . $filename); //Sử dụng Intervention Image để quản lý ảnh, resize() kích thước của ảnh nếu ảnh có độ phân giải quá lớn
            $user->avatar = $filename;
            $user->save();
            return redirect()->back()->with('message', "Change avatar successfully");
        } else if ($user) {
            $user->avatar = $this->defaultImage;
            $user->save();
            return  redirect()->back()->with('message', 'Something went wrong');
        }
    }

    public function destroy(int $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();
        return redirect('admin/users')->with('message', 'Delete user successfully');
    }

    public function destroyAvatar(int $user_id)
    {
        $user = User::findOrFail($user_id);
        if ($user->avatar && $user->avatar != 'default.jpg') {
            File::delete($this->uploadsAvatarPath . $user->avatar);
            $user->avatar = $this->defaultImage;
            $user->save();
            return redirect()->back()->with('message', 'Remove avatar successfully');
        }
        else{
            return redirect()->back();
        }
    }
}
