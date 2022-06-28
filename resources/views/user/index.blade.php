@extends('layouts.app')
@section('content')
    {{-- @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif --}}
    <h1 class="text-center mt-5">
        I TUOI PIATTI
    </h1>
    <div class="row justify-content-center my-5">
        @foreach ($plates as $plate)
            <div class="card m-3" style="width: 18rem;">
                <img src="{{ asset('storage/' . $plate->image) }}" class="card-img-top" alt="{{ $plate->name }}">
                <div class="card-body">
                    <h4 class="card-title">{{ $plate->name }}</h4>
                    <p class="card-text">{{ $plate->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
