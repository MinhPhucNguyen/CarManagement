@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
                <div class="d-inline-block fw-bold text-white fs-4">
                    Create New User
                </div>
                <a href="{{ url('admin/users/') }}" class="btn btn-danger fw-bold float-right ">
                    <i class="fa-solid fa-arrow-left"></i>
                    BACK
                </a>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/users') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstname">Firstname</label>
                            <input type="text" name="firstname"
                                class="form-control @error('firstname') is-invalid  @enderror"
                                value="{{ !$errors->has('firstname') ? old('firstname') : '' }}">
                            @error('firstname')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastname">Lastname</label>
                            <input type="text" name="lastname"
                                class="form-control @error('lastname') is-invalid  @enderror"
                                value="{{ !$errors->has('lastname') ? old('lastname') : '' }}">
                            @error('lastname')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Gender</label>
                            <div>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input " type="radio" name="gender" id="male"
                                        value="1">
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <div style="width: 10px; display: inline-block"></div>
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" name="gender" type="radio" id="female"
                                        value="0">
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username"
                                class="form-control @error('username') is-invalid  @enderror"
                                value="{{ !$errors->has('username') ? old('username') : '' }}">
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid  @enderror"
                                value="{{ !$errors->has('email') ? old('email') : '' }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid  @enderror"
                                value="{{ !$errors->has('phone') ? old('phone') : '' }}">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address"
                                class="form-control @error('address') is-invalid  @enderror"
                                value="{{ !$errors->has('address') ? old('address') : '' }}">
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid  @enderror">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password"
                                class="form-control @error('confirm_password') is-invalid  @enderror"
                                value="{{ !$errors->has('confirm_password') ? old('confirm_password') : '' }}">
                            @error('confirm_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="role_as">Role as</label>
                            <select name="role_as" class="form-control @error('role_as') is-invalid  @enderror">
                                <option value="">--Select Role--</option>
                                <option value="admin"
                                    {{ !$errors->has('role_as') && old('role_as') == 'admin' ? 'selected' : '' }}>
                                    Admin</option>
                                <option value="user"
                                    {{ !$errors->has('role_as') && old('role_as') == 'user' ? 'selected' : '' }}>
                                    User</option>
                            </select>
                            @error('role_as')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <button name="create_btn" class="btn btn-success pr-4 pl-4 fw-bold">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
