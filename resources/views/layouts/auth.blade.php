<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Coinpel Tour - Auth')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="vh-100">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-8 col-lg-6 mx-md-auto d-flex justify-content-center align-items-center">
                @yield('content')
            </div>

            <div class="col-md-6 p-0 align-items-end d-none d-lg-flex position-relative" style="background-color: rgba(89, 62, 117, 1)">
                <img 
                    class="w-100 h-75 opacity-50" 
                    src="{{ asset('images/Group 313.svg') }}" 
                    alt="Banner"
                >
            </div>
        </div>
    </div>
</body>
</html>
