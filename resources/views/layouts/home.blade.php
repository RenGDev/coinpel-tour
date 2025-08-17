<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Coinpel Tour')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="vh-100">
    <div class="container-fluid h-100">
        <div class="row h-100">

            @include('components.sidebar')

            <div class="col-md-9 col-lg-10 bg-light p-4">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>