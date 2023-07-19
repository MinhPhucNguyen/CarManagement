<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>Car Management</title>
    <!-- Custom fonts for this template-->
    {{-- <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"> --}}
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin_styles.css') }}">

    @livewireStyles
</head>

<body id="page-top">

    <div id="wrapper">
        <!-- Sidebar -->
        @include('layouts.includes.admin.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layouts.includes.admin.topbar')
                <div class="main">
                    <div class="container-fluid">
                        <div class="row mt-4">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.includes.admin.footer')
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/js/adminHandle.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    {{-- <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script> --}}

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>
   
    @livewireScripts
    @stack('scripts')

</body>

</html>
