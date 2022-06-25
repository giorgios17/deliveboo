@extends('layouts.app')
@section('content')
    @foreach ($plates as $plate)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/' . $plate->image) }}" class="card-img-top" alt="{{ $plate->name }}">
            <div class="card-body">
                <h4 class="card-title">{{ $plate->name }}</h4>
                <p class="card-text">{{ $plate->description }}</p>
                <p class="card-text">Prezzo: {{ $plate->price }}€</p>
                <a href="{{ route('admin.plate.edit', $plate->id) }}" class="btn btn-primary">Modifica</a>
            </div>
        </div>
    @endforeach
@endsection
