@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
                <div class="d-inline-block fw-bold text-white fs-4">
                    Edit User
                </div>
                <a href="{{ url('admin/users') }}" class="btn btn-danger fw-bold float-right ">
                    <i class="fa-solid fa-arrow-left"></i>
                    BACK
                </a>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/users/' . $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="col-md-6 mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username"
                                class="form-control @error('username') is-invalid  @enderror" value="{{ $user->username }}">
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid  @enderror"
                                value="{{ $user->email }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid  @enderror"
                                value="{{ $user->phone }}">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid  @enderror"
                                placeholder="*Leave blank if you dont want to change password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password"
                                class="form-control @error('confirm_password') is-invalid  @enderror"
                                placeholder="*Leave blank if you dont want to change password">
                            @error('confirm_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="role_as">Role as</label>
                            <select name="role_as" class="form-control @error('role_as') is-invalid  @enderror"
                                value="{{ $user->role_as }}">
                                <option value="">--Select Role--</option>
                                <option value="admin" {{ $user->role_as == '1' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                            </select>
                            @error('role_as')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <button name="create_btn" class="btn btn-success">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
