<div class="col-md-3 col-lg-2 text-white h-100 d-flex flex-column" style="background-color: rgba(89, 62, 117, 1); width: 12rem;">
    <img class="w-75 mt-4 mb-5 mx-auto" src="{{ asset('images/side_bar_logo.png') }}" alt="logo">
    <ul class="nav nav-pillss gap-4 flex-column mb-auto mx-3">

        @if (auth()->user()->is_admin)
            <li class="nav-item d-flex align-items-center m-0">
                <i class="bi bi-people-fill fs-4"></i>
                <a href="{{ route('users.index') }}" class="nav-link text-white">Clientes</a>
            </li>

            <li class="nav-item d-flex align-items-center m-0">
                <i class="bi bi-people fs-4"></i>
                <a href="{{ route('drivers.index') }}" class="nav-link text-white">Motoristas</a>
            </li>

            <li class="nav-item d-flex align-items-center m-0">
                <i class="bi bi-graph-up fs-4"></i>
                <a href="{{ route('statistics.index') }}" class="nav-link text-white">Estatísticas</a>
            </li>
        
            <li class="nav-item d-flex align-items-center m-0">
                <i class="bi bi-bus-front fs-4"></i>
                <a href="{{ route('vehicles.index') }}" class="nav-link text-white">Veiculos</a>
            </li>
            <li class="nav-item d-flex align-items-center m-0">
                <i class="bi bi-bus-front-fill fs-4"></i>
                <a href="{{ route('travels.index') }}" class="nav-link text-white">Viagens</a>
            </li>
        @endif

        <li class="nav-item d-flex align-items-center m-0">
            <i class="bi bi-journal-text fs-4"></i>
            <a href="{{ route('travels.contracts') }}" class="nav-link text-white">Contratos</a>
        </li>
        <li class="nav-item d-flex align-items-center m-0">
            <i class="bi bi-wallet2 fs-4"></i>
            <a href="{{ route('travels.packages') }}" class="nav-link text-white">Pacotes</a>
        </li>
    </ul>
</div>