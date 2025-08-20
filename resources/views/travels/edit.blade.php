@extends('layouts.home')

@section('title', 'CoinTur | Editar Viagem')

@section('menu-title')
    Editar Viagem
@endsection

@section('content')
<div class="w-100 fs-3 d-flex bg-light justify-content-center gap-4 py-3 mb-5"><span>{{ $travel->origin }}</span> > <span>{{ $travel->destination }}</span></div>
<form id="editTravelForm" action="{{ route('travels.update', $travel->id) }}" method="POST" class="w-100 d-flex px-5 py-2 mb-5 flex-column gap-3">
    @csrf
    @method('PUT')

    <div class="mb-3 d-flex align-items-center gap-2">
        <select name="status" id="status" class="form-select" style="width: 12rem;">
            @foreach(App\Enums\TravelStatus::cases() as $status)
                <option value="{{ $status->value }}" {{ $travel->status == $status->value ? 'selected' : '' }}>
                    {{ $status->value }}
                </option>
            @endforeach
        </select>
    </div>

    <span class="fs-5">Informações da viagem:</span>

    <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
        <label class="fw-lighter" for="name">Nome da Viagem:</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $travel->name) }}" required>
    </div>

    <div class="row gap-2">
        <div class="col-lg mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="rule">Rule:</label>
            <select class="form-select" name="rule" id="rule" required>
                @foreach(App\Enums\TravelRule::cases() as $rule)
                    <option value="{{ $rule->value }}" {{ $travel->rule->value == $rule->value ? 'selected' : '' }}>{{ $rule->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg">
            <label class="fw-lighter" for="date">Data:</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $travel->date) }}" required>
        </div>
    </div>

    <div class="row gap-2">
        <div class="col-lg">
            <label class="fw-lighter" for="departureTime">Hora de Saída:</label>
            <input type="time" name="departure_time" id="departureTime" class="form-control" value="{{ old('departureTime', $travel->departureTime) }}">
        </div>
         <div class="col-lg">
            <label class="fw-lighter" for="origin">Origem:</label>
            <input type="text" name="origin" id="origin" class="form-control" value="{{ old('origin', $travel->origin) }}" required>
        </div>
    </div>

    <div class="row gap-2">
        <div class="col-lg">
            <label class="fw-lighter" for="destination">Destino:</label>
            <input type="text" name="destination" id="destination" class="form-control" value="{{ old('destination', $travel->destination) }}" required>
        </div>
        <div class="col-lg">
            <label class="fw-lighter" for="value">Valor:</label>
            <input type="number" name="value" id="value" class="form-control" value="{{ old('value', $travel->value) }}" min="0" step="0.01" required>
        </div>
    </div>

    <span class="fs-5">Dados do veiculo:</span>

    <div class="mb-3 row gap-2">
        <div class="col-lg">
            <label class="fw-lighter" for="vehicle_id">Veículo:</label>
            <select name="vehicle_id" id="vehicle_id" class="form-select" required>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}" {{ $travel->vehicle_id == $vehicle->id ? 'selected' : '' }}>
                        {{ $vehicle->identification_name }} - {{ $vehicle->plate }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-lg">
            <label class="fw-lighter" for="capacity">Numero de passageiros:</label>
            <input type="number" name="capacity" id="capacity" class="form-control" value="{{ $travel->vehicle->capacity }}" min="0" step="0.01" disabled>
        </div>
    </div>

    <span class="fs-5">Motorista:</span>

    <div class="mb-3 row gap-2">
        <div class="col-lg">
            <label  class="fw-lighter" for="driver_id">Nome:</label>
            <select name="driver_id" id="driver_id" class="form-select" required>
                @foreach($drivers as $driver)
                    <option value="{{ $driver->id }}" {{ $travel->driver_id == $driver->id ? 'selected' : '' }}>
                        {{ $driver->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-lg">
            <label class="fw-lighter" for="registration">Matricula:</label>
            <input type="text" name="registration" id="registration" class="form-control" value="{{ $travel->driver->registration }}" min="0" step="0.01" disabled>
        </div>
    </div>

</form>

<div class="d-flex align-items-center gap-2 ms-5 mb-4">
    <button type="submit" class="btn btn-primary px-4" style="background-color: rgba(89, 62, 117, 1);" form="editTravelForm">Salvar alterações</button>
    <a href="{{ route('travels.index') }}" class="btn border-dark fw-bold px-3" style="cursor: pointer;">Cancelar</a>
</div>

@endsection

@php
    $statusColors = [
        App\Enums\TravelStatus::NAO_INICIADA->value => 'gray',
        App\Enums\TravelStatus::EM_ANDAMENTO->value => '#F2C94C',
        App\Enums\TravelStatus::CONCLUIDA->value => '#6FCF97',
        App\Enums\TravelStatus::CANCELADA->value => '#EB5757',
    ];
@endphp

@push('scripts')
    <script>
        const statusSelect = document.getElementById('status');
        const statusColors = @json($statusColors);
        
        function updateSelectColor() {
            statusSelect.style.backgroundColor = statusColors[statusSelect.value] || 'white';
            statusSelect.style.color = 'white';
        }
    
        updateSelectColor();
    
        statusSelect.addEventListener('change', updateSelectColor);
    </script>
@endpush


