<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Coinpel Tour')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body class="vh-100 ">
    <div class="container-fluid h-100">
        <div class="row h-100">

            <div class="col-md-3 col-lg-2 d-none d-md-block text-white d-flex flex-column" style="background-color: rgba(89, 62, 117, 1); min-height: 100vh;">
                @include('components.sidebar')
            </div>

            <div class="col bg-white p-0 d-flex flex-column " style="min-height: 100vh;">
                @include('components.add-menu')
                @include('components.edit-menu')
                @include('components.edit-driver-menu')
                @include('components.navbar')
                <div class="flex-grow-1">
                    @include('components.drivers-grid')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
     @stack('scripts')
</body>
</html>