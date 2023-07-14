@extends('layouts.admin')

@section('content')
    @include('layouts.includes.overlay_loading.overlay_loading')

    <div class="toast align-items-center shadow" role="toast" aria-live="assertive" aria-atomic="true">
        <div class="toast-content d-flex p-0 ">
            <div class="d-flex align-items-center mr-3 fs-5">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <div class="toast-body p-0 fw-bold mw-50">
                <p class="m-0">Mail has been sent to minhphuc.nguyen1609@gmail.com</p>
            </div>
            <div class="close-btn">
                <button type="button" class="btn-close btn-close-white me-2 m-auto pl-3 pr-3" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa-sharp fa-solid fa-circle-check"></i>
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                style="padding: 1.05rem 1rem"></button>
        </div>
    @endif

    <div>
        <a href="{{ url('admin/users') }}" class="btn btn-danger fw-bold">
            <i class="fa-solid fa-arrow-left"></i>
            BACK
        </a>
        <div class="view-container w-100 shadow d-flex  justify-content-between rounded">
            <div class="view-left-container">
                <ul class="view-left-list">
                    <li class="view-left-item selected">
                        <i class="fa-solid fa-user"></i>
                        <span class="ml-1">Profile</span>

                    </li>
                    <li class="view-left-item">
                        <i class="fa-solid fa-pen"></i>
                        <span class="ml-1">Compose</span>
                    </li>
                    @if ($user->role_as != '1')
                        <li class="text-danger mt-4 view-left-item-delete">
                            <button type="button" class="delete-user-btn fw-bold fs-6 text-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteConfirmModal{{ $user->id }}">
                                <span>Delete User</span>
                            </button>
                        </li>
                        @include('layouts.includes.modal.modal_delete_user')
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
                                    <img src="{{ asset('uploads/avatar/' . $user->avatar ?? 'uploads/avatar/default.jpg')   }}" alt="avatar default"
                                        class="rounded-circle" style="object-fit: cover">
                                </div>
                                @if ($user->role_as == '1' && Auth::user()->username == $user->username)
                                    <div class="image-avatar-upload">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-success fw-bold mt-2 " type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Avatar
                                            </button>
                                            <ul class="dropdown-menu">
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
                                <p class="fs-4 fw-bolder text-dark mb-1">
                                    {{ $user->firstname . ' ' . $user->lastname }}
                                </p>
                                <p class="fw-bolder mb-1 {{ $user->role_as == '1' ? 'text-danger' : 'text-success' }}">
                                    {{ $user->role_as == '1' ? 'Admin' : 'User' }}</p>
                                <p class="fs-6 fw-bolder text-secondary"> {{ $user->address }}</p>
                                <button class="btn btn-success fw-bold mt-3 send-email-btn">
                                    <i class="fa-solid fa-envelope"></i>
                                    <span class="ml-2 fw-bold" style="font-size: 14px">SEND EMAIL</span>
                                </button>
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
                                        <p class="mb-1 user-info-title">Firstname</p>
                                        <p class="user-info">{{ $user->firstname }}</p>
                                    </div>
                                    <div class="user-info-item-right w-50">
                                        <p class="mb-1 user-info-title">Lastname</p>
                                        <p class="user-info">{{ $user->lastname }}</p>
                                    </div>
                                </div>
                                <div class="row  d-flex w-100 mb-2">
                                    <div class="user-info-item-left pr-4 w-50">
                                        <p class="mb-1 user-info-title">Username</p>
                                        <p class="user-info">{{ $user->username }}</p>
                                    </div>
                                    <div class="user-info-item-right w-50">
                                        <p class="mb-1 user-info-title">Gender</p>
                                        <p class="user-info">{{ $user->gender == '1' ? 'Male' : 'Female' }}</p>
                                    </div>
                                </div>
                                <div class="row  d-flex w-100 mb-2">
                                    <div class="user-info-item-left pr-4 w-50">
                                        <p class="mb-1 user-info-title">Email Address</p>
                                        <p class="user-info">{{ $user->email }}</p>
                                    </div>
                                    <div class="user-info-item-right w-50">
                                        <p class="mb-1 user-info-title">Phone Number</p>
                                        <p class="user-info">{{ $user->phone }}</p>
                                    </div>
                                </div>
                                <div class="row  d-flex w-100 mb-2">
                                    <div class="user-info-item-left pr-4 w-50">
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
                        <div class="w-100">
                            <div class="w-50 mx-auto mt-4">
                                <form action="{{ route('sendEmail') }}" method="POST" class="emailFrom">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="fw-bold mb-0" for="">From</label>
                                        <input type="text" name="emailFrom" placeholder="Enter Email"
                                            class="form-control" value="{{ Auth::user()->email }}">
                                        @error('emailFrom')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="fw-bold mb-0" for="">Name</label>
                                        <input type="text" name="name" placeholder="Enter Name"
                                            class="form-control"
                                            value="{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="fw-bold mb-0" for="">To</label>
                                        <input type="text" name="emailTo" placeholder="Enter Email"
                                            class="form-control" value="{{ $user->email }}">
                                        @error('emailTo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="fw-bold mb-0" for="">Subject</label>
                                        <input type="text" name="subject" placeholder="Enter Subject"
                                            class="form-control">
                                        @error('subject')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="fw-bold mb-0" for="">Message</label>
                                        <textarea name="message" placeholder="Enter Message" class="form-control" cols="1" rows="8"></textarea>
                                        @error('message')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="float-end">
                                        <button type="submit" class="btn btn-success fw-bold pl-4 pr-4 send-btn">
                                            <i class="fa-regular fa-paper-plane"></i>
                                            <span class="ml-1">Send</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
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
                this.form.submit();
                overlay.style.display = "block";
            });

            imageAvatarLoading.addEventListener("load", function() {
                overlay.style.display = "none";
            });
        </script>

        <script>
            //Handle selected view left item in view a user
            const itemSelect = document.querySelectorAll(".view-left-item");
            const email = document.querySelector("#email");
            const profile = document.querySelector("#profile");
            const sendEmailBtn = document.querySelector(".send-email-btn");

            itemSelect.forEach((item) => {
                item.addEventListener("click", function() {
                    itemSelect.forEach((otherItem) => {
                        otherItem.classList.toggle("selected", otherItem === item);
                    });

                    profile.classList.toggle("active", this === itemSelect[0]);
                    email.classList.toggle("active", this !== itemSelect[0]);
                });
            });

            sendEmailBtn.addEventListener('click', function(e) {
                e.preventDefault();
                itemSelect.forEach((item) => {
                    item.classList.toggle('selected', item === itemSelect[1]);
                })
                email.classList.toggle('active', true);
                profile.classList.toggle('active', false);
            })
        </script>

        <script>
            const sendBtn = document.querySelector('.send-btn');
            const emailForm = document.querySelector('.emailFrom');

            sendBtn.addEventListener('click', function(e) {
                e.preventDefault();
                emailForm.submit();

                // Vô hiệu hóa nút send email
                this.setAttribute('disabled');
                this.innerHTML = `
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="ml-1">Sending...</span>`;
            })
        </script>

        <script>
            const toastBody = document.querySelector('.toast-body p');
            const toast = new bootstrap.Toast('.toast');

            @if (Session::has('message'))
                toastBody.innerText = "{{ session('message') }}";
                toast.show();
                setTimeout(() => {
                    const toastt = document.querySelector('.toast');
                    toastt.classList.add('hide-toast');
                }, 5200);
            @endif
        </script>

       
    @endpush
