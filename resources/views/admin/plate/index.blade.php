@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($plates as $plate)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $plate->image) }}" class="card-img-top" alt="{{ $plate->name }}">
                    <div class="card-body">
                        <h4 class="card-title">{{ $plate->name }}</h4>
                        <p class="card-text">{{ $plate->description }}</p>
                        <p class="card-text">Prezzo: {{ $plate->price }}€</p>
                        <a href="{{ route('admin.plate.edit', $plate->id) }}" class="btn btn-primary">Modifica</a>
                        <form action="{{ route('admin.plate.destroy', $plate->id) }}" method="post"
                            class=" d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type='submit' onclick="return confirm('Sicuro di voler cancellare questo piatto?')"
                                type="submit" value="" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
