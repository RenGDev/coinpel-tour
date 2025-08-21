@extends('layouts.home')

@section('title', 'CoinTur | Contracts')

@section('content')

<div class="container">
    <h1 class="mb-4">Seus Contratos</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('fail'))
        <div class="alert alert-danger">{{ session('fail') }}</div>
    @endif

    <div class="row ms-md-5 mt-2">
        @foreach(auth()->user()->travels as $travel)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body shadow-lg">
                        <h5 class="card-title">{{ $travel->name }}</h5>
                        <p><strong>Origem:</strong> {{ $travel->origin }}</p>
                        <p><strong>Destino:</strong> {{ $travel->destination }}</p>
                        <p><strong>Data:</strong> {{ $travel->date }}</p>
                        <p><strong>Valor:</strong> R$ {{ number_format($travel->value, 2, ',', '.') }}</p>

                        <form method="POST" action="{{ route('travels.unsubscribe', $travel->id) }}">
                            @csrf
                            <button class="btn w-100 text-white" style="background-color: rgba(89, 62, 117, 1);">Sair da viagem</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
