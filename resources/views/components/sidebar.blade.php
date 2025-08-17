<div class="col-md-3 col-lg-2 text-white d-flex gap-4 justify-content-center flex-column" style="background-color: rgba(89, 62, 117, 1)">
    <img class="w-50 mt-4 mx-auto" src="{{ asset('images/side_bar_logo.png') }}" alt="logo">
    <ul class="nav nav-pillss gap-4 flex-column mb-auto mx-3">
        <li class="nav-item d-flex align-items-center m-0">
            <img class="h-50" src="{{ asset('images/client_group.png') }}" alt="">
            <a href="{{ route('users.index') }}" class="nav-link text-white">Clientes</a>
        </li>
        <li class="nav-item d-flex align-items-center m-0">
            <img class="h-50" src="{{ asset('images/drivers.png') }}" alt="">
            <a href="{{ route('home.drivers') }}" class="nav-link text-white">Motoristas</a>
        </li>
        <li class="nav-item d-flex align-items-center m-0">
            <img class="h-50" src="{{ asset('images/carbon_bus.png') }}" alt="">
            <a href="{{ route('home.drivers') }}" class="nav-link text-white">Veiculos</a>
        </li>
        <li class="nav-item d-flex align-items-center m-0">
            <img class="h-50" src="{{ asset('images/travels.png') }}" alt="">
            <a href="{{ route('home.travels') }}" class="nav-link text-white">Viagens</a>
        </li>
    </ul>
</div>