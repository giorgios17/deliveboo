@extends('layouts.app')
@section('content')
    {{-- @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif --}}
    <div id="user_index" class="row justify-content-center mb-5">
        <h1 class="col-12 text-center p-3 mb-5 shadow">
            I TUOI PIATTI
        </h1>
        @foreach ($plates as $plate)
            <div class="card m-3 shadow" style="width: 18rem;">
                <div class="wrapper_img p-3">
                    <img src="{{ asset('storage/' . $plate->image) }}" class="card-img-top h-100 w-100"
                        alt="{{ $plate->name }}">
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $plate->name }}</h4>
                    <p class="card-text">{{ $plate->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
