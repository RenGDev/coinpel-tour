@extends('layouts.home')

@include('components.edit-vehicle-menu')

@section('title', 'CoinTur | Veiculos')

@section('add-button')
    <button id="add-button" type="button" class="btn btn-primary fw-bold" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop" style="background-color: rgba(89, 62, 117, 1);">+ Adicionar Veiculo</button>
@endsection

@section('filter')
    <button class="btn btn-white shadow-sm px-5 py-2 fw-bold">Filtrar</button>
@endsection

@section('search')
<form action="{{ route('vehicles.index') }}" method="GET" class="d-flex align-items-center">
    <div class="input-group input-group-sm">
        <input 
            type="text" 
            name="search" 
            class="form-control rounded-end rounded-start border-0 shadow-sm py-2" 
            placeholder="Pesquisar veiculo" 
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
    Veiculo
@endsection

@section('form-content')

<form id="registerForm" action="{{ route('vehicles.store') }}" method="POST" class="w-100 d-flex gap-2 flex-column">
    @csrf
    @method('POST')

    <span>Dados do Veículo: </span>

    <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
        <label class="fw-lighter" for="identification_name" style="font-size: 15px;">Nome de identificação:</label>
        <input class="form-control border-dark border-opacity-25" type="text" name="identification_name" id="identification_name">
    </div>

    <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
        <label class="fw-lighter" for="plate" style="font-size: 15px;">Placa:</label>
        <input class="form-control border-dark border-opacity-25" type="text" name="plate" id="plate">
    </div>

    <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
        <label class="fw-lighter" for="model" style="font-size: 15px;">Modelo:</label>
        <input class="form-control border-dark border-opacity-25" type="text" name="model" id="model">
    </div>

    <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
        <label class="fw-lighter" for="chassi" style="font-size: 15px;">Chassi:</label>
        <input class="form-control border-dark border-opacity-25" type="text" name="chassi" id="chassi">
    </div>

    <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
        <label class="fw-lighter" for="capacity" style="font-size: 15px;">Capacidade:</label>
        <input class="form-control border-dark border-opacity-25" type="number" name="capacity" id="capacity">
    </div>

    <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
        <label class="fw-lighter" for="bus_type" style="font-size: 15px;">Tipo de Ônibus:</label>
        <input class="form-control border-dark border-opacity-25" type="text" name="bus_type" id="bus_type">
    </div>

    <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
        <label class="fw-lighter" for="bench" style="font-size: 15px;">Bancada:</label>
        <input class="form-control border-dark border-opacity-25" type="text" name="bench" id="bench">
    </div>

    <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
        <label class="fw-lighter" for="year" style="font-size: 15px;">Ano:</label>
        <input class="form-control border-dark border-opacity-25" type="number" name="year" id="year">
    </div>

    <div class="row row-cols-2 gap-1 mb-3">
        @php
            $features = [
                'internet' => ['label' => 'Internet', 'icon' => 'bi-wifi'],
                'wc' => ['label' => 'Wc', 'icon' => 'bi-badge-wc'],
                'socket' => ['label' => 'Tomada', 'icon' => 'bi-plug'],
                'air_conditioning' => ['label' => 'Ar condicionado', 'icon' => 'bi-wind'],
                'fridge' => ['label' => 'Geladeira', 'icon' => 'bi-snow'],
                'heating' => ['label' => 'Calefação', 'icon' => 'bi-fire'],
                'video' => ['label' => 'Vídeo', 'icon' => 'bi-display'],
            ];
        @endphp

        @foreach($features as $key => $feature)
            <input type="checkbox" class="btn-check" id="{{ $key }}" name="{{ $key }}" value="1" autocomplete="off">
            <label class="btn btn-outline-secondary" style="width: 11rem; border: 1px solid rgba(89, 62, 117, 1); color: rgba(89, 62, 117, 1);" for="{{ $key }}">
                <i class="bi {{ $feature['icon'] }}"></i> {{ $feature['label'] }}
            </label>
        @endforeach
    </div>
</form>


@endsection

@section('content')
<div class="table-responsive h-100 w-100">
    <table class="table align-middle table-hover">
        <thead>
            <tr>
                <th scope="col" class="ps-5 py-3 fw-normal">Prefixo</th>
                <th scope="col" class="py-3 fw-normal">Placa</th>
                <th scope="col" class="py-3 fw-normal">Modelo</th>
                <th scope="col" class="py-3 fw-normal">Chassi</th>
                <th scope="col" class="py-3 fw-normal">Tipo de veiculo</th>
                <th scope="col" class="py-3 fw-normal">Capacidade</th>
                <th scope="col" class="py-3 fw-normal">Ano</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicles as $vehicle)
                <tr>
                    <td class="ps-5 py-3 text-muted">{{ $vehicle->id }}</td>
                    <td class="py-3 text-muted">{{ $vehicle->plate }}</td>
                    <td class="py-3 text-muted">{{ $vehicle->model }}</td>
                    <td class="py-3 text-muted">{{ $vehicle->chassi }}</td>
                    <td class="py-3 text-muted">{{ $vehicle->bus_type }}</td>
                    <td class="py-3 text-muted">{{ $vehicle->capacity }}</td>
                    <td class="py-3 text-muted">{{ $vehicle->year }}</td>
                    <td class="ps-5 py-3 text-center">
                        <div class="dropdown">
                            <button class="btn btn-sm bg-transparent border-0 p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots fs-3 text-dark"></i>
                            </button>
                            <ul class="dropdown-menu border-0 dropdown-menu-start p-0">
                                <li class="border shadow-sm mb-2 rounded">
                                    <button 
                                        class="dropdown-item rounded d-flex gap-2 btn-edit" 
                                        data-bs-toggle="offcanvas" 
                                        data-bs-target="#editVehicleBackdrop" 
                                        data-id="{{ $vehicle->id }}"
                                        data-identification_name="{{ $vehicle->identification_name }}"
                                        data-plate="{{ $vehicle->plate }}"
                                        data-model="{{ $vehicle->model }}"
                                        data-chassi="{{ $vehicle->chassi }}"
                                        data-bench="{{ $vehicle->bench }}"
                                        data-capacity="{{ $vehicle->capacity }}"
                                        data-bus_type="{{ $vehicle->bus_type }}"
                                        data-year="{{ $vehicle->year }}"
                                        data-internet="{{ (int) $vehicle->internet }}"
                                        data-wc="{{ (int) $vehicle->wc }}"
                                        data-socket="{{ (int) $vehicle->socket }}"
                                        data-air_conditioning="{{ (int) $vehicle->air_conditioning }}"
                                        data-fridge="{{ (int) $vehicle->fridge }}"
                                        data-heating="{{ (int) $vehicle->heating }}"
                                        data-video="{{ (int) $vehicle->video }}"
                                    >
                                    <i class="bi bi-pencil-square"></i>Editar veiculo</button>
                                </li>
                                <li class="border shadow-sm rounded">
                                    <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item rounded d-flex gap-2" onclick="return confirm('Tem certeza que deseja deletar este motorista?')">
                                            <i class="bi bi-trash"></i> Deletar Veiculo
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
