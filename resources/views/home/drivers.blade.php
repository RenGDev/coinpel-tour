@extends('layouts.home')

@section('title', 'CoinTur | Motoristas')

@section('add-button')
    <button id="add-button" type="button" class="btn btn-primary fw-bold" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop" style="background-color: rgba(89, 62, 117, 1);">+ Adicionar Motorista</button>
@endsection

@section('filter')
    <button class="btn btn-white shadow-sm px-5 py-2 fw-bold">Filtrar</button>
@endsection

@section('search')
<form action="{{ route('drivers.index') }}" method="GET" class="d-flex align-items-center">
    <div class="input-group input-group-sm">
        <input 
            type="text" 
            name="search" 
            class="form-control rounded-end rounded-start border-0 shadow-sm py-2" 
            placeholder="Pesquisar motorista" 
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
    Motorista
@endsection

@section('form-content')
    <form id="registerForm" action="{{ route('drivers.store') }}" method="POST" class="w-100 d-flex flex-column">
        @csrf
        @method('POST')
        
        <span class="fw-bold mb-3">Dados Pessoais:</span>
        
        <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="name" style="font-size: 15px;">Nome completo:</label>
            <input class="form-control border-dark border-opacity-25" type="text" name="name" id="name" required>
        </div>
        
        <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="bornDate" style="font-size: 15px;">Data de Nascimento:</label>
            <input class="form-control border-dark border-opacity-25" type="date" name="bornDate" id="bornDate">
        </div>
    
        <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="registration" style="font-size: 15px;">Matricula:</label>
            <input class="form-control border-dark border-opacity-25" type="text" name="registration" id="registration">
        </div>
    
        <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="cpf" style="font-size: 15px;">CPF:</label>
            <input class="form-control border-dark border-opacity-25" type="text" name="cpf" id="cpf">
        </div>
    
        <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="rg" style="font-size: 15px;">RG:</label>
            <input class="form-control border-dark border-opacity-25" type="text" name="rg" id="rg">
        </div>
    
        <span class="fw-bold mb-3 mt-4">Endereço:</span>
    
        <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="cep" style="font-size: 15px;">CEP:</label>
            <input class="form-control border-dark border-opacity-25" type="text" name="cep" id="cep">
        </div>
    
        <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="address" style="font-size: 15px;">Endereço:</label>
            <input class="form-control border-dark border-opacity-25" type="text" name="address" id="address">
        </div>
    
        <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="number" style="font-size: 15px;">Número:</label>
            <input class="form-control border-dark border-opacity-25" type="text" name="number" id="number">
        </div>
    
        <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="city" style="font-size: 15px;">Cidade:</label>
            <input class="form-control border-dark border-opacity-25" type="text" name="city" id="city">
        </div>
    
        <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="state" style="font-size: 15px;">Estado:</label>
            <input class="form-control border-dark border-opacity-25" type="text" name="state" id="state">
        </div>

        <span class="fw-bold mb-3 mt-4">Contato:</span>

        <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="phone" style="font-size: 15px;">Telefone:</label>
            <input class="form-control border-dark border-opacity-25" type="text" name="phone" id="phone">
        </div>

        <div>
            <label class="fw-lighter" for="email" style="font-size: 15px;">E-mail:</label>
            <input class="form-control border-dark border-opacity-25" type="email" name="email" id="email">
        </div>
    </form>    
@endsection

@section('content')
    @section('grid-content')
        @foreach (
        $drivers as $driver)
            @include('components.driver-card')
        @endforeach 
    @endsection
@endsection