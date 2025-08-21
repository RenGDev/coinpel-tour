@extends('layouts.auth')

@section('title', 'CoinTour | Login')

@section('content')
    <div class="container m-auto">
        <form class="d-flex flex-column align-items-center gap-2" method="POST" action='{{ route('login') }}'>

            @csrf
            @method('POST')   
            
            <img class="w-50" src='{{ asset('images/logo.png') }}' alt=""> 

            
                    
        </form>
    </div>

    
@endsection