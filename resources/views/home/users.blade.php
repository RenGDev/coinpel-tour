
@extends('layouts.home')

@section('title', 'CoinTur | Clientes')

@section('add-button')
    <button id="add-button" type="button" class="btn btn-primary fw-bold" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop" style="background-color: rgba(89, 62, 117, 1);">+ Adicionar Usuário</button>
@endsection

@section('filter')
    <button class="btn btn-white shadow-sm px-5 py-2 fw-bold">Filtrar</button>
@endsection

@section('search')
<form action="{{ route('users.index') }}" method="GET" class="d-flex align-items-center">
    <div class="input-group input-group-sm">
        <input 
            type="text" 
            name="search" 
            class="form-control rounded-end rounded-start border-0 shadow-sm py-2" 
            placeholder="Pesquisar usuário" 
            value="{{ request('search') }}"
            style="padding-right: 2.5rem;"
        >
        <span class="position-absolute end-0 top-0 h-100 d-flex align-items-center pe-2 pointer-events-none">
            <i class="bi bi-search text-muted"></i>
        </span>
    </div>
</form>
@endsection

@section('menu-title')
    Usuário
@endsection

@section('form-content')
     <form id="registerForm" action="{{ route('users.store') }}" method="POST" class="w-100 d-flex flex-column">
            @csrf
            @method('POST')
            <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
                <label class="fw-lighter" for="name" style="font-size: 15px;">Nome completo:</label>
                <input class="form-control border-dark border-opacity-25" type="text" name="name" id="name">
            </div>
        
            <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
                <label class="fw-lighter" for="email" style="font-size: 15px;">E-mail:</label>
                <input class="form-control border-dark border-opacity-25" type="email" name="email" id="email">
            </div>
        
            <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
                <label class="fw-lighter" for="password" style="font-size: 15px;">Senha provisória:</label>
                <input class="form-control border-dark border-opacity-25" type="password" name="password" id="password">
            </div>

            <div class="form-check form-switch d-flex align-items-center gap-2">
                <input class="form-check-input h-100" style="width: 3rem" type="checkbox" name="is_admin" value="1" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label fw-lighter" for="flexSwitchCheckDefault">Admin</label>
            </div>

    </form>
@endsection
@section('edit-menu-title')
    Editar Usuario
@endsection
@section('content')
<div class="table-responsive h-100 w-100">
    <table class="table align-middle table-hover">
        <thead>
            <tr>
                <th scope="col" class="ps-3 ps-md-5 py-3 fw-normal">Usuário</th>
                <th scope="col" class="py-3 fw-normal">E-mail</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr data-id="{{ $user->id }}">
                    <td class="ps-3 ps-md-5 py-3 text-muted">{{ $user->name }}</td>
                    <td class="py-3 text-muted">{{ $user->email }}</td>
                    <td class="ps-5 py-3 text-center">
                        <div class="dropdown">
                            <button class="btn btn-sm bg-transparent border-0 p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots fs-3 text-dark"></i>
                            </button>
                            <ul class="dropdown-menu border-0 dropdown-menu-start p-0">
                                <!-- Botão Editar -->
                                <li class="border shadow-sm mb-2 rounded">
                                    <button class="dropdown-item rounded d-flex gap-2" 
                                            type="button" 
                                            data-bs-toggle="offcanvas" 
                                            data-bs-target="#editBackdrop" 
                                            aria-controls="editBackdrop"
                                            data-id="{{ $user->id }}"
                                            data-name="{{ $user->name }}"
                                            data-email="{{ $user->email }}"
                                            data-photo="{{ $user->photo}}">
                                        <i class="bi bi-pencil-square"></i>Editar usuário
                                    </button>
                                </li>
                                <li class="border shadow-sm mb-2 rounded">
                                    <button class="dropdown-item rounded" type="button"><i class="bi bi-ban"></i> Bloquear Usuário</button>
                                </li>
                                <li class="border shadow-sm rounded">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item rounded d-flex gap-2" onclick="return confirm('Tem certeza que deseja deletar este usuário?')">
                                            <i class="bi bi-trash"></i> Deletar usuário
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

