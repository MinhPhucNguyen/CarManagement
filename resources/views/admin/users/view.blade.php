@extends('layouts.admin')

@section('content')
    <!-- Modal Delete Confirm -->
    <div class="modal fade" id="deleteConfirmModal{{ $user->id }}" tabindex="-1"
        aria-labelledby="deleteConfirmModalLabel{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmModalLabel{{ $user->id }}">
                        Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.includes.overlay_loading.overlay_loading')

    <div>
        @include('layouts.includes.alert.alert_message')

        <a href="{{ url('admin/users') }}" class="btn btn-danger fw-bold">
            <i class="fa-solid fa-arrow-left"></i>
            BACK
        </a>
        <div class="view-container w-100 shadow d-flex  justify-content-between rounded">
            <div class="view-left-container">
                <ul class="view-left-list">

                    <li class="view-left-item selected">Profile</li>
                    <li class="view-left-item">Email</li>

                    @if ($user->role_as != '1')
                        <li class="text-danger mt-4 view-left-item-delete">
                            <button type="button" class="delete-user-btn fw-bold fs-6 text-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteConfirmModal{{ $user->id }}">
                                <span>Delete User</span>
                            </button>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="border bg-body-secondary view-border rounded-5"></div>

            <div class="view-right-container d-flex flex-column">
                <div id="profile" class="section active">
                    <div class="view-right-item rounded-3 border d-flex justify-content-between">
                        <div class="d-flex">
                            <div class="image-avatar-container text-center">
                                <div class="image-avatar">
                                    <img src="{{ asset('uploads/avatar/' . $user->avatar) }}" alt="avatar default"
                                        class="rounded-circle" style="object-fit: cover">
                                </div>
                                @if ($user->role_as == '1' && Auth::user()->username == $user->username)
                                    <div class="image-avatar-upload">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-success fw-bold mt-2 " type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Avatar
                                            </button>
                                            <ul class="dropdown-menu"">
                                                <li><button
                                                        class="dropdown-item btn change-avatar-btn fw-bolder">Change</button>
                                                </li>
                                                <li><a href="{{ route('users.destroyAvatar', $user->id) }}"
                                                        class="dropdown-item btn remove-avatar-btn text-danger fw-bolder">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <form action="{{ route('users.updateAvatar', $user->id) }}" method="POST"
                                            enctype="multipart/form-data" class="form-avatar-input">
                                            @csrf
                                            @method('PUT')
                                            <input id="avatar-file-input" name="avatar-input" type="file"
                                                style="display: none" />
                                        </form>
                                    </div>
                                @endif
                            </div>
                            <div class="info ml-4">
                                <p class="fs-4 fw-bolder text-dark mb-1"> {{ $user->username }}</p>
                                <p class="fw-bolder mb-1 {{ $user->role_as == '1' ? 'text-danger' : 'text-success' }}">
                                    {{ $user->role_as == '1' ? 'Admin' : 'User' }}</p>
                                <p class="fs-6 fw-bolder text-secondary"> {{ $user->address }}</p>
                                <button type="button" class="btn btn-success fw-bold mt-3" data-bs-toggle="modal"
                                    data-bs-target="#sendEmailModal">
                                    <i class="fa-solid fa-envelope"></i>
                                    <span class="ml-2" style="font-size: 14px">SEND EMAIL</span>
                                </button>

                                {{-- SEND EMAIL MODAL --}}
                                <div class="modal fade" id="sendEmailModal" tabindex="-1" aria-labelledby="sendEmailLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="sendEmailLabel">New Email</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="" method="POST">
                                                <div class="modal-body pl-4 pr-4">
                                                    <div class="form-group mb-4">
                                                        <label class="fw-bold mb-0" for="">Form</label>
                                                        <input type="text" name="email-form" placeholder="Enter Email"
                                                            value="{{ Auth::user()->role_as == '1' ? Auth::user()->email : '' }}"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="fw-bold mb-0" for="">To</label>
                                                        <input type="text" name="email-to" placeholder="Enter Email"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="fw-bold mb-0" for="">Name</label>
                                                        <input type="text" name="name" placeholder="Enter Name"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="fw-bold mb-0" for="">Title</label>
                                                        <input type="text" name="title" placeholder="Enter Title"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="fw-bold mb-0" for="">Message</label>
                                                        <textarea type="text" name="username" placeholder="Enter username" class="form-control" cols="1"
                                                            rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">SEND</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="edit-user-btn d-flex align-items-center">
                            <a href="{{ route('users.edit', $user->id) }}"
                                class="edit-btn-in-view bg-transparent fw-bold mr-4">
                                <span class="mr-2">Edit</span>
                                <i class="fa-solid fa-user-pen"></i>
                            </a>
                        </div>
                    </div>
                    <div class="view-right-item rounded-3 border d-flex justify-content-between mt-4 mb-4">
                        <div class="w-75">
                            <p class="fw-bolder text-dark mb-4">User information</p>
                            <div class="user-info-container">
                                <div class="row  d-flex w-100 mb-2">
                                    <div class="user-info-item-left pr-4 w-50">
                                        <p class="mb-1 user-info-title">Username</p>
                                        <p class="user-info">{{ $user->username }}</p>
                                    </div>
                                    <div class="user-info-item-right w-50">
                                        <p class="mb-1 user-info-title">Email Address</p>
                                        <p class="user-info">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <div class="row  d-flex w-100 mb-2">
                                    <div class="user-info-item-left pr-4 w-50">
                                        <p class="mb-1 user-info-title">Phone Number</p>
                                        <p class="user-info">{{ $user->phone }}</p>
                                    </div>
                                    <div class="user-info-item-right w-50">
                                        <p class="mb-1 user-info-title">Address</p>
                                        <p class="user-info">{{ $user->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="edit-user-btn d-flex align-items-center">
                            <a href="{{ route('users.edit', $user->id) }}"
                                class="edit-btn-in-view bg-transparent fw-bold mr-4">
                                <span class="mr-2">Edit</span>
                                <i class="fa-solid fa-user-pen"></i>
                            </a>
                        </div>
                    </div>
                    <div class="view-right-item rounded-3 border d-flex justify-content-between">
                        <div class="w-75">
                            <p class="fw-bolder text-dark mb-4">Car Rental Information</p>
                            <div class="car-rental-info-container">
                                <p class="text-warning fw-bold">There are no rental cars</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="email" class="section">
                    <div class="view-right-item rounded-3 border d-flex justify-content-between">
                        <div class="w-50">
                            <p class="fw-bolder text-dark mb-4">This is the email sent</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script>
            //Handle change avatar
            const changeAvatarBtn = document.querySelector(".change-avatar-btn");
            const changeAvatarInput = document.querySelector("#avatar-file-input");
            const imageAvatarLoading = document.querySelector(".image-avatar img");
            const overlay = document.querySelector(".overlay");

            changeAvatarBtn.addEventListener("click", function() {
                changeAvatarInput.click();
            });

            changeAvatarInput.addEventListener("change", function() {
                overlay.style.display = "block";
                this.form.submit();
            });

            imageAvatarLoading.addEventListener("load", function() {
                overlay.style.display = "none";
            });
        </script>
    @endpush
