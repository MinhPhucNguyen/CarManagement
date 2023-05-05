<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <title>Car Management</title>
</head>

<body>
    <div class="container">
        @include('layouts.includes.navbar')
        <div>
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.css') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>
</body>

</html>
