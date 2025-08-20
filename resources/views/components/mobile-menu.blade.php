<div class="offcanvas offcanvas-end" style="background-color: rgba(89, 62, 117, 1);" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title text-white fs-4" id="offcanvasNavbarLabel">Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column gap-4">

        <div class="d-flex align-items-center gap-2">

            <div class="dropdown">
                <button class="border-0 bg-transparent rounded-circle border-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <x-avatar :src="auth()->user()->photo ?? null" :size="80"/>
                </button>
                <ul class="dropdown-menu border-0 dropdown-menu-start p-0">
                    <li class="border shadow-sm mb-2 rounded">
                        <a href="{{ route('users.index') }}" class="dropdown-item rounded d-flex gap-2">
                            <i class="bi bi-person"></i> Usuários
                        </a>
                    </li>
                    <li class="border shadow-sm rounded">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="dropdown-item rounded d-flex gap-2" onclick="return confirm('Tem certeza que deseja sair?')">
                                <i class="bi bi-box-arrow-right"></i> Sair
                            </button>
                        </form>
                    </li>
                </ul>
            </div> 
			<div class="d-flex flex-column" style="max-width: 150px;">
				<span class="fw-bold text-white" style="font-size: 15px;">{{ auth()->user()->name }}</span>
				<span class="text-light text-truncate" style="font-size: 15px;">{{ auth()->user()->is_admin ? 'Administrador' : 'Usuário'}}</span>
			</div>
        </div>

        <ul class="nav nav-pillss gap-4 flex-column mb-auto mx-3">
            @if (auth()->user()->is_admin)
                <li class="nav-item d-flex align-items-center m-0">
                    <i class="bi bi-people-fill text-white fs-4"></i>
                    <a href="{{ route('users.index') }}" class="nav-link text-white">Clientes</a>
                </li>
            @endif
            
            <li class="nav-item d-flex align-items-center m-0">
                <i class="bi bi-people text-white fs-4"></i>
                <a href="{{ route('drivers.index') }}" class="nav-link text-white">Motoristas</a>
            </li>
            
            @if (auth()->user()->is_admin)
                <li class="nav-item d-flex align-items-center m-0">
                    <i class="bi bi-graph-up text-white fs-4"></i>
                    <a href="{{ route('statistics.index') }}" class="nav-link text-white">Estatísticas</a>
                </li> 
            @endif
            
            <li class="nav-item d-flex align-items-center m-0">
                <i class="bi bi-bus-front text-white fs-4"></i>
                <a href="{{ route('vehicles.index') }}" class="nav-link text-white">Veiculos</a>
            </li>
            <li class="nav-item d-flex align-items-center m-0">
                <i class="bi bi-bus-front-fill text-white fs-4"></i>
                <a href="{{ route('travels.index') }}" class="nav-link text-white">Viagens</a>
            </li>
            <li class="nav-item d-flex align-items-center m-0">
                <i class="bi bi-journal-text text-white fs-4"></i>
                <a href="#" class="nav-link text-white">Contratos</a>
            </li>
            <li class="nav-item d-flex align-items-center m-0">
                <i class="bi bi-wallet2 text-white fs-4"></i>
                <a href="#" class="nav-link text-white">Pacotes</a>
            </li>
        </ul>
    </div>
</div>
