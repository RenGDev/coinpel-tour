@extends('layouts.auth')

@section('title', 'CoinTour | Login')

@section('content')
    <div class="container m-auto">
        <form class="d-flex flex-column align-items-center" method="POST" action='{{ route('login') }}'>

            @csrf
            @method('POST')   
            
            <img class="w-50" src='{{ asset('images/logo.png') }}' alt=""> 
            <div class="d-flex flex-column w-50 gap-3">
                <span>Faça login:</span>   
                <input class="form-control fw-lighter" type="email" name="email" id="email" placeholder="E-mail">  
                <input class="form-control fw-lighter" type="password" name="password" id="password" placeholder="Password">
                <button class="btn btn-primary" style="background-color: rgba(89, 62, 117, 1)" type="submit">Entrar</button>
            </div>   
                    
        </form>
    </div>
@endsection
