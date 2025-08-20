@include('components.mobile-menu')
<nav class="navbar bg-white navbar-light bg-light px-2 py-4">
  <div class="container-fluid d-flex gap-4 flex-column-reverse flex-md-row ">
    <div class="d-flex gap-3">
        @yield('add-button')
        @yield('filter')
    </div>

    <div class="d-flex gap-3">
        @yield('search')
        <button class="bg-transparent border-0 d-none d-md-block"><i class="bi bi-bell fs-4"></i></button>
        <div class="d-flex align-items-center gap-2">
            <div class="dropdown d-none d-md-block">
                <button class="border-0 bg-transparent rounded-circle border-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <x-avatar :src="auth()->user()->photo ?? null" :size="45"/>
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
            
			<div class="flex-column d-none d-md-flex" style="max-width: 150px;">
				<span class="fw-bold" style="font-size: 15px;">{{ auth()->user()->name }}</span>
				<span class="text-muted text-truncate" style="font-size: 15px;">{{ auth()->user()->is_admin ? 'Administrador' : 'Usuário'}}</span>
			</div>
        </div>
        <button class="navbar-toggler float-end d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    

  </div>
</nav>