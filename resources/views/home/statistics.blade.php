@extends('layouts.home')

@section('title', 'CoinTur | Estatísticas')

@section('menu-title')
    Estatísticas
@endsection

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Estatísticas do Sistema</h2>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total de Viagens</h5>
                    <p class="fs-3">{{ $totalTravels }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total de Usuários</h5>
                    <p class="fs-3">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total de Motoristas</h5>
                    <p class="fs-3">{{ $totalDrivers }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total de Veiculos</h5>
                    <p class="fs-3">{{ $totalVehicles }}</p>
                </div>
            </div>
        </div>
    </div>



    <hr class="my-4">

    <h4>Viagens por Status</h4>
    <ul>
        @foreach($travelsByStatus as $status => $count)
            <li><strong>{{ $status }}</strong>: {{ $count }}</li>
        @endforeach
    </ul>

    <canvas id="travelsChart" width="360" height="200"></canvas>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('travelsChart').getContext('2d');
    const travelsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($travelsByStatus->keys()) !!},
            datasets: [{
                label: 'Quantidade de Viagens',
                data: {!! json_encode($travelsByStatus->values()) !!},
                backgroundColor: ['blue','green','orange','red']
            }]
        }
    });
</script>
@endpush
