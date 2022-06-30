@extends('layouts.app')
@section('content')
    <h1 class="text-center mt-5">
        LA TUA LISTA PIATTI
    </h1>
    <div class="row justify-content-center my-5">
        @foreach ($plates as $plate)
            <div class="card m-3 " style="width: 18rem;">
                <img src="{{ asset('storage/' . $plate->image) }}" class="card-img-top" alt="{{ $plate->name }}">
                <div class="card-body">
                    <h4 class="card-title">{{ $plate->name }}</h4>
                    <p class="card-text mb-2">{{ $plate->description }}</p>
                    <p class="card-text mb-2">Prezzo: {{ $plate->price }}€</p>
                    <p class="card-text mb-2">Visibile:
                        @if ($plate->visible)
                            Si
                        @else
                            No
                        @endif
                    </p>
                    <a href="{{ route('admin.plate.edit', $plate->id) }}" class="btn btn-primary">Modifica</a>
                    <form action="{{ route('admin.plate.destroy', $plate->id) }}" method="post" class=" d-inline-block">
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
@endsection
