@extends('layouts.home')

@section('title', 'CoinTur | Criar Viagem')

@section('menu-title')
    Nova Viagem
@endsection

@section('content')
<form id="registerForm" action="{{ route('travels.store') }}" method="POST" class="w-100 d-flex px-5 mb-5 py-2 flex-column gap-3">
    @csrf
    @method('POST')

    <div class="col mb-3 d-flex flex-column gap-2 text-start w-100">
        <label class="fw-lighter" for="name" style="font-size: 15px;">Nome da Viagem:</label>
        <input class="form-control border-dark border-opacity-25" type="text" name="name" id="name" required>
    </div>
    
    <div class="row gap-2">
        <div class="col-lg mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="rule" style="font-size: 15px;">Rule:</label>
            <select class="form-select border-dark border-opacity-25" name="rule" id="rule" required>
                <option value="">Selecione a Rule</option>
                @foreach(App\Enums\TravelRule::cases() as $rule)
                    <option value="{{ $rule->value }}">{{ $rule->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg">
            <label class="fw-lighter" for="date" style="font-size: 15px;">Data:</label>
            <input class="form-control border-dark border-opacity-25" type="date" name="date" id="date" required>
        </div>

    </div>

    <div class="row gap-2">
        <div class="col-lg">
            <label class="fw-lighter" for="departureTime" style="font-size: 15px;">Hora de Saída:</label>
            <input class="form-control border-dark border-opacity-25" type="time" name="departure_time" id="departureTime" required>
        </div>
        <div class="col-lg mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="origin" style="font-size: 15px;">Origem:</label>
            <input class="form-control border-dark border-opacity-25" type="text" name="origin" id="origin" required>
        </div>
    </div>

    <div class="row gap-2">
        <div class="col-lg mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="destination" style="font-size: 15px;">Destino:</label>
            <input class="form-control border-dark border-opacity-25" type="text" name="destination" id="destination" required>
        </div>
        <div class="col-lg mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="value" style="font-size: 15px;">Valor:</label>
            <input class="form-control border-dark border-opacity-25" type="number" name="value" id="value" min="0" step="0.01" required>
        </div>
    </div>


    <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
        <label class="fw-lighter" for="vehicle_id" style="font-size: 15px;">Veículo:</label>
        <select class="form-select border-dark border-opacity-25" name="vehicle_id" id="vehicle_id" required>
            <option value="">Selecione o veículo</option>
            @foreach($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}">{{ $vehicle->identification_name }} - {{ $vehicle->plate }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
        <label class="fw-lighter" for="driver_id" style="font-size: 15px;">Motorista:</label>
        <select class="form-select border-dark border-opacity-25" name="driver_id" id="driver_id" required>
            <option value="">Selecione o motorista</option>
            @foreach($drivers as $driver)
                <option value="{{ $driver->id }}">{{ $driver->name }}</option>
            @endforeach
        </select>
    </div>
</form>

<div class="d-flex align-items-center gap-2 ms-5 mb-4">
    <button type="submit" class="btn btn-primary px-4" style="background-color: rgba(89, 62, 117, 1);" form="editTravelForm">Registrar veiculo</button>
    <a href="{{ route('travels.index') }}" class="btn border-dark fw-bold px-3" style="cursor: pointer">Cancelar</a>
</div>
@endsection

@push('scripts')
<script>
    const occupiedTravels = @json($travels);

    const vehicleSelect = document.getElementById('vehicle_id');
    const driverSelect = document.getElementById('driver_id');
    const dateInput = document.getElementById('date');
    const timeInput = document.getElementById('departureTime');

    function updateAvailability() {
        const selectedDate = dateInput.value;
        const selectedTime = timeInput.value;

        [...vehicleSelect.options].forEach(option => option.disabled = false);
        [...driverSelect.options].forEach(option => option.disabled = false);

        if (!selectedDate || !selectedTime) return;

        occupiedTravels.forEach(travel => {
            if (travel.date === selectedDate && travel.departureTime === selectedTime) {
                const vehicleOption = vehicleSelect.querySelector(`option[value="${travel.vehicle_id}"]`);
                if (vehicleOption) vehicleOption.disabled = true;

                const driverOption = driverSelect.querySelector(`option[value="${travel.driver_id}"]`);
                if (driverOption) driverOption.disabled = true;
            }
        });
    }

    dateInput.addEventListener('change', updateAvailability);
    timeInput.addEventListener('change', updateAvailability);
</script>
@endpush
