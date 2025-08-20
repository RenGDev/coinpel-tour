@extends('layouts.home')

@section('title', 'CoinTur | Viagens')

@section('add-button')
    <a href="{{ route('travels.create') }}" class="btn btn-primary fw-bold" style="background-color: rgba(89, 62, 117, 1);">+ Adicionar Viagem</a>
@endsection

@section('filter')
    <button class="btn btn-white shadow-sm px-5 py-2 fw-bold">Filtrar</button>
@endsection

@section('search')
<form action="{{ route('travels.index') }}" method="GET" class="d-flex align-items-center">
    <div class="input-group input-group-sm">
        <input 
            type="text" 
            name="search" 
            class="form-control rounded-end rounded-start border-0 shadow-sm py-2" 
            placeholder="Pesquisar viagem" 
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
    Viagem
@endsection


@section('content')
<div class="table-responsive h-100 w-100">
    <table class="table align-middle table-hover">
        <thead>
            <tr>
                <th scope="col" class="ps-5 py-3 fw-normal">Status</th>
                <th scope="col" class="py-3 fw-normal">Nome</th>
                <th scope="col" class="py-3 fw-normal">Data</th>
                <th scope="col" class="py-3 fw-normal">Horário</th>
                <th scope="col" class="py-3 fw-normal">Rota</th>
                <th scope="col" class="py-3 fw-normal">Veículo</th>
                <th scope="col" class="py-3 fw-normal">Rule</th>
                <th scope="col" class="py-3 fw-normal">Motorista</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($travels as $travel)
                <tr>
                    <td class="ps-5 py-3 text-muted">{{ $travel->status }}</td>
                    <td class="py-3 text-muted">{{ $travel->name }}</td>
                    <td class="py-3 text-muted">{{ \Carbon\Carbon::parse($travel->date)->format('d/m/Y') }}</td>
                    <td class="py-3 text-muted">{{ \Carbon\Carbon::parse($travel->departure_time)->format('H:i') }}</td>
                    <td class="py-3 text-muted">{{ $travel->origin }} > {{ $travel->destination }}</td>
                    <td class="py-3 text-muted">{{ $travel->vehicle->identification_name ?? 'N/A' }}</td>
                    <td class="py-3 text-muted">{{ $travel->rule }}</td>
                    <td class="py-3 text-muted">{{ $travel->driver->name ?? 'N/A' }}</td>
                    <td class="ps-5 py-3 text-center">
                        <div class="dropdown">
                            <button class="btn btn-sm bg-transparent border-0 p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots fs-3 text-dark"></i>
                            </button>
                            <ul class="dropdown-menu border-0 dropdown-menu-start p-0">
                                <li class="border shadow-sm mb-2 rounded">
                                    <a href="{{ route('travels.edit', $travel->id) }}" class="dropdown-item rounded d-flex gap-2"><i class="bi bi-pencil-square"></i>Editar viagem</a>
                                </li>
                                <li class="border shadow-sm rounded">
                                    <form action="{{ route('travels.destroy', $travel->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item rounded d-flex gap-2" onclick="return confirm('Tem certeza que deseja deletar esta viagem?')">
                                            <i class="bi bi-trash"></i> Deletar viagem
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
